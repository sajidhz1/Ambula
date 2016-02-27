<?php
/**
 * Created by PhpStorm.
 * User: sajidhz
 * Date: 1/7/2015
 * Time: 12:14 PM
 */
use Facebook\FacebookHttpable;
use Facebook\FacebookCurl;
use Facebook\FacebookCurlHttpClient;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;

use Illuminate\Database\Capsule\Manager as Capsule;

class RegistrationModel
{

    public function __construct(DataBase $db)
    {
        $this->db = $db;
    }


    // model method for inserting new personal user in to the data base
    public function validateFields(){

        $first_name_flag = $last_name_flag = $email_flag = $password_flag = $username_flag = false;
        $nameErr = $emailErr = $last_nameErr = $passwordErr = $usernameErr = "";
        $first_name = $email = $last_name = $password = $username = "";


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //firstname validation
            if (empty($_POST["first_name"])) {
                $nameErr = "firstName is required";
                $first_name_flag = false;
            } else {
                $first_name_flag = true;
                $first_name = $this->test_input($_POST["first_name"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
                    $first_name_flag = false;
                    $nameErr = "Only letters and white space allowed";
                }
            }

            if (empty($_POST["username"])) {
                $usernameErr = "username required";
                $username_flag = false;
            } else {
                $username = $this->test_input($_POST["username"]);
                $username_flag = true;
            }

            //lastname validation
            if (empty($_POST["last_name"])) {
                $nameErr = "LastName is required";
                $last_name_flag = false;
            } else {
                $last_name_flag = true;
                $last_name = $this->test_input($_POST["last_name"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
                    $last_name_flag = false;
                    $nameErr = "last nameletters and white space allowed";
                }
            }

            //password validation
            if (empty($_POST["password"]) || empty($_POST["password_confirm"])) {
                $nameErr = "Name is required";
                $password_flag = false;
            } else {
                $password_flag = true;
                $password = $this->test_input($_POST["password"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
                    $password_flag = false;
                    $nameErr = "pass letters and white space allowed";
                }
            }

            //email validation

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
                $email_flag = false;
            } else {
                $email_flag = true;
                $email = $this->test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $this->flag_log = false;
                    $emailErr = "Invalid email format";
                }
            }


        }

        if (!$first_name_flag || !$last_name_flag || !$email_flag || !$password_flag || !$username_flag) {
            return false;
        }

        $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
        $password_hash = password_hash($password, PASSWORD_BCRYPT, array('cost' => $hash_cost_factor));

        // generate integer-timestamp for saving of account-creating date
        $user_creation_timestamp = time();

        //insert into user table

        $sql2 = "INSERT INTO users (user_email, user_name, user_password_hash, user_provider_type)
                VALUES (:user_email, :user_name, :user_password_hash, :user_provider_type)";

        $query = $this->db->prepare($sql2);


        //$user_personal = Capsule::table('user_personal')->insertGetId(array('first_name' => $first_name,'last_name' => $last_name));
        $result = $query->execute(array(
            ':user_email' => $email,
            ':user_name' => $username,
            ':user_password_hash' => $password_hash,
            ':user_provider_type' => 'DEFAULT'));

        $user_personal_id = $this->db->lastInsertId();

        $sql = "INSERT INTO user_personal (first_name,last_name,users_user_id) VALUES ('" . $first_name . "','" . $last_name . "','" . $user_personal_id . "')";
        $this->db->prepare($sql)->execute();

        Session::set('refferer', 'registration');

        return $result;

    }


    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //register with facebook
    public function registerWithFacebook(){
        // instantiate the facebook object
        FacebookSession::setDefaultApplication(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);

        $helper = new FacebookRedirectLoginHelper('http://theambula.lk/registration/registerWithFacebook');


        try {
            $session = $helper->getSessionFromRedirect();
        } catch (FacebookRequestException $ex) {
            echo $ex;
        } catch (Exception $ex) {
            echo $ex;
        }

// see if we have a session
        if ($session) {

            // graph api request for user data
            $request = new FacebookRequest($session, 'GET', '/me');
            $response = $request->execute();
            // get response
            $graphObject = $response->getGraphObject();

           // $fusername = $graphObject->getProperty('username');    // To Get Facebook email ID

            //Session::init();

            if ($this->checkFacebookUIDExistsinDatabase($graphObject)) {

                return true;
            }else if($this->checkEmailExistingInDataBase($graphObject)){

                return true;
            } else {
                $this->registerNewUserWithFacebook($graphObject);
            }




        } else {
            $loginUrl = $helper->getLoginUrl(array('email'));

            header("Location: " . $loginUrl);
        }

    }

    public function initSession($object , $uid='' , $username =''){

        $fbfullname = $object->getProperty('first_name'); // To Get Facebook full name
        $femail = $object->getProperty('email');    // To Get Facebook email ID

        $fbid = $object->getProperty('id');              // To Get Facebook ID

        Session::set('name', $fbfullname);
        Session::set('username', $username);
        Session::set('email', $femail);
        Session::set('fbid', $fbid);
        Session::set('user_logged_in', true);
        Session::set('uid', $uid);
    }

    public function checkFacebookUIDExistsinDatabase($object = '')
    {
        $fbid = $object->getProperty('id');              // To Get Facebook ID


        $query = $this->db->prepare("SELECT user_id,user_name FROM users WHERE user_facebook_uid = :user_facebook_uid");
        $query->execute(array(':user_facebook_uid' => $fbid));

        if ($query->rowCount() == 1) {

            $query->fetch();
            $this->initSession($object , $query->user_id , $query->user_name);
            return true;
        }
        // default return
        return false;
    }

    public function getIdOfUser($object){

        $email = $object->getProperty('email');
            echo $email;
        $query = $this->db->prepare("SELECT user_email,user_id , user_name FROM users WHERE user_email = :user_email");
        $query->execute(array(':user_email' => $email));

        if ($query->rowCount() == 1) {
            $query->fetch();
            $this->initSession($object , $query->user_id , $query->user_name);
            return true;
        }
        // default return
        return false;
    }


    public function checkEmailExistingInDataBase($email=''){

        $query = $this->db->prepare("SELECT user_email FROM users WHERE user_email = :user_email");
        $query->execute(array(':user_email' => $email));

        if ($query->rowCount() == 1) {
            return true;
        }
        // default return
        return false;

    }

    public function registerNewUserWithFacebook($graphObject)
    {
        $fbid = $graphObject->getProperty('id');              // To Get Facebook ID
        $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
        $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
        // delete dots from facebook-username (it's the common way to do this like that)
        $clean_user_name_from_facebook = str_replace(".", "", $fbfullname);
        // generate integer-timestamp for saving of account-creating date
        $user_creation_timestamp = time();

        $sql = "INSERT INTO users (user_name, user_email, user_creation_timestamp, user_active, user_provider_type, user_facebook_uid)
                VALUES (:user_name, :user_email, :user_creation_timestamp, :user_active, :user_provider_type, :user_facebook_uid)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_name' => $clean_user_name_from_facebook,
            ':user_email' => $femail,
            ':user_creation_timestamp' => $user_creation_timestamp,
            ':user_active' => 1,
            ':user_provider_type' => 'FACEBOOK',
            ':user_facebook_uid' => $fbid));

        $count = $query->rowCount();
        if ($count == 1) {
            $query = $this->db->prepare("SELECT user_id, user_name, user_email, user_account_type, user_provider_type
                                         FROM   users
                                         WHERE  user_name = :user_name AND user_provider_type = :provider_type");
            $query->execute(array(':user_name' => $clean_user_name_from_facebook, ':provider_type' => 'FACEBOOK'));
            $count_from_select_statement = $query->rowCount();
            if ($count_from_select_statement == 1) {
                // registration successful
                return true;
            }
        }
        // default return
        return false;
    }

    public function checkEmail($email = ""){
        $query = $this->db->prepare("SELECT user_email FROM  users  WHERE  user_email = :email");
        $query->execute(array(':email' => $email));
        $count = $query->rowCount();
        if ($count >= 1) {
            http_response_code(400);
        } else {
            http_response_code(200);
        }

    }

    public function checkUserName($userName = ""){
        $query = $this->db->prepare("SELECT  user_name FROM users WHERE  user_name = :user_name");
        $query->execute(array(':user_name' => $userName));
        $count = $query->rowCount();
        if ($count >= 1) {
            http_response_code(400);
        } else {
            http_response_code(200);
        }
    }


    public function checkCooperateUserName($userName = ""){
        $query = $this->db->prepare("SELECT  user_name FROM users WHERE  user_name = '$userName'");
        $query->execute();
        $count = $query->rowCount();
        if ($count >= 1) {
            return true;
        } else {
            false;
        }
    }


    //register new commercial user
    public function register_commercial_user(){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $company_name_flag = $address_flag = $telephone1_flag = $telephone2_flag = $city_flag = $district_flag = $email_flag = $password_flag = $company_logo_flag = $username_flag = false;
            $nameErr = $emailErr = $teleErr = $teleErr2 = $passwordErr = $cityErr = $districtErr = $logoErr = $addresErr = $usernameErr = "";
            $company_name = $address = $telephone1 = $telephone2 = $city = $district = $company_logo = $email = $password = $username = "";

            //companyname validation
            if (empty($_POST["company_name"])) {
                $nameErr = "company name is required";
                $company_name_flag = false;
            } else {
                $company_name_flag = true;
                $company_name = $this->test_input($_POST["company_name"]);
                // check if name only contains letters and whitespace
                /*if (!preg_match("/^[a-zA-Z0-9 ]*$/",$company_name)) {
                    $company_name_flag = false;
                    $nameErr = "Only letters and white space allowed";
                }*/
            }

            //address validation
            if (empty($_POST["address_1"])) {
                $addresErr = "address is required";
                $address_flag = false;
            } else {
                $address_flag = true;
                $address = $this->test_input($_POST["address_1"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-z0-9- ]+$/i", $address)) {
                    $address_flag = false;
                    $addressErr = "Only letters and white space and numbers allowed";
                }
            }

            //validate password
            if (empty($_POST["password"]) || empty($_POST["password_confirm"])) {
                $nameErr = "password is needed";
                $password_flag = false;
            } else {
                $password_flag = true;
                $password = $this->test_input($_POST["password"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
                    $password_flag = false;
                    $nameErr = "pass letters and white space allowed";
                }
            }

            //validate email
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
                $email_flag = false;
            } else {
                $email_flag = true;
                $email = $this->test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $this->flag_log = false;
                    $emailErr = "Invalid email format";
                }
            }

            //validate telephone_1
            if (empty($_POST["telephone_1"])) {
                $teleErr = "Hotline is required";
                $telephone1_flag = false;
            } else {
                $telephone1_flag = true;
                $telephone1 = $this->test_input($_POST["telephone_1"]);
                // check if name only contains letters and whitespace

            }

            //validate telephone_2
            if (empty($_POST["telephone_2"])) {
                $teleErr = "Secondary Telephone is required";
                $telephone2_flag = false;
            } else {
                $telephone2_flag = true;
                $telephone2 = $this->test_input($_POST["telephone_2"]);
                // check if name only contains letters and whitespace

            }

            //username validation
            if (empty($_POST["username"])) {
                $usernameErr = "Username is required";
                $username_flag = false;
            } else {
                $username_flag = true;
                $username = $this->test_input($_POST["username"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[A-Za-z0-9_-]{3,16}$/", $username)) {
                    $username_flag = false;
                    $usernameErr = "Only letters and white space allowed";
                }
            }

            //to validate the city field
            if (empty($_POST["city"])) {
                $cityErr = "Nearest City is required";
                $cityErr = false;
            } else {
                $city_flag = true;
                $city = $this->test_input($_POST["city"]);
            }

            //To validate the district field
            if (empty($_POST["district"])) {
                $districtErr = "District is required";
                $district_flag = false;
            } else {
                $district_flag = true;
                $district = $this->test_input($_POST["district"]);

            }

            $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
            $password_hash = password_hash($password, PASSWORD_BCRYPT, array('cost' => $hash_cost_factor));


            //  echo "name".$company_name_flag."add" .$address_flag ."tel".$telephone1_flag ."em".$email_flag ."pass".$password_flag."logo".$company_logo_flag ."user".$username_flag."";
            if (!$company_name_flag && !$address_flag && !$telephone1_flag && !$email_flag && !$password_flag && !$company_logo_flag && !$username_flag)
                return false;

        }

        //generating activation hash
        $hash = md5(rand(0, 1000));

        $sql = "INSERT INTO users (user_email, user_name, user_password_hash, user_account_type , user_provider_type ,user_activation_hash)
                VALUES (:email , :user_name , :password_hash, :user_account_type , :user_provider_type , :hash )";
        $result = $this->db->prepare($sql);
        $result->execute(array(':email' => $email, ':user_name' => $username, ':password_hash' => $password_hash, ':user_account_type' => 2, ':user_provider_type' => "DEFAULT", ':hash' => $hash));

        Session::set('username',$username);
        $user_id = $this->db->lastInsertId();

        $sql_1 = "INSERT INTO commercial_user (users_user_id ,company_name, address_1, telephone_1 , telephone_2 , city, district )
                VALUES ( :user_id, :company_name , :address ,:telephone1 , :telephone2 ,:city , :district)";
        $result2 = $this->db->prepare($sql_1);
        $result2->execute(array(':user_id' => $user_id, ':company_name' => $company_name, ':address' => $address, ':telephone1' => $telephone1, ':telephone2' => $telephone2, ':city' => $city, ':district' => $district));

        $this->sendVerificationEmail($email, $username, $password, $hash);

        return true;

    }

    public function update_commercial_user(){

        //  $website = $facebook = $youtube = $description = $user_name  = '' ;

        $website = $_POST["web_site_url"];
        $facebook = $_POST["facebook_url"];
        $youtube = $_POST["youtube_url"];
        $user_name = $_SESSION["username"];
        $description = $_POST["description"];

        $count = count($_POST['cat_checkbox']);


        $path = "uploads/profile/commercial_user/" . $user_name;
        if (!is_dir($path)) {
            mkdir($path);
        }

        if ($this->imageUpload("company_logo", $user_name)) {

            $sql_0 = "SELECT user_id FROM users WHERE user_name = '" . $user_name . "'";

            $sth = $this->db->prepare($sql_0);
            $sth->execute();
            $user_id = $sth->fetch()->user_id;


            $sql_4 = "SELECT idcommercial_user FROM commercial_user WHERE users_user_id = " . $user_id;

            $sth = $this->db->prepare($sql_4);
            $sth->execute();
            $cooperate_user_id = $sth->fetch()->idcommercial_user;

            for ($i = 0; $i < $count; $i++) {
                $sql_2 = "INSERT INTO cooperate_user_has_Product_categories (cooperate_user_id , Product_categories_id_product_categories) VALUES ('" . $cooperate_user_id . "' ,'" . $_POST['cat_checkbox'][$i] . "')";
                $sth = $this->db->prepare($sql_2);
                $sth->execute();
            }

            $sql = "UPDATE users SET user_avatar = '1" . $user_name . "' WHERE user_id =  '" . $user_id . "' ";
            $result = $this->db->prepare($sql)->execute();


            $sql_1 = "UPDATE commercial_user SET web_url ='" . $website . "' ,facebook_url = '" . $facebook . "' , youtube_url = '" . $youtube . "' , description = '" . $description . "' WHERE users_user_id = '" . $user_id . "'";
            $result2 = $this->db->prepare($sql_1)->execute();

            Session::set('reffererCommercial', 'registrationCommercial');

            return true;

        }

    }

    public function imageUpload($name = '', $path = '')
    {

        $target_dir = "uploads/profile/commercial_user/" . $path . "/";
        $target_file = $target_dir . basename($_FILES[$name]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$name]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES[$name]["size"] > 2000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_dir . $path . '.' . $imageFileType)) {

                return true;

            } else {
                return false;
            }
        }
    }


    public function loadCategories()
    {
        $result = $this->db->query("SELECT * FROM product_categories")->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($result);

    }

    public function sendVerificationEmail($email = '', $name = '', $password = '', $hash = '')
    {
        $to = $email; // Send email to our user
        $subject = 'Signup | Verification'; // Give the email a subject
        $message = '

        Thanks for signing up!
        Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

        ------------------------
        Username: ' . $name . '
        Password: ' . $password . '
        ------------------------

        Please click this link to activate your account:
        http://theambula.lk/login/verify?email=' . $email . '&hash=' . $hash . '

        '; // Our message above including the link

        $headers = 'From:noreply@theambula.lk' . "\r\n"; // Set from headers
        mail($to, $subject, $message, $headers); // Send our email
    }

} 