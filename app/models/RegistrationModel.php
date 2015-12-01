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

class RegistrationModel {

    public function __construct(DataBase $db)
    {
        $this->db = $db;
    }

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
                if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
                    $first_name_flag = false;
                    $nameErr = "Only letters and white space allowed";
                }
            }

            if(empty($_POST["last_name"])){
                $usernameErr = "username required";
                $username_flag = false;
            }else{
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
                if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
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
                if (!preg_match("/^[a-zA-Z0-9]*$/",$password)) {
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

        if(!$first_name_flag || !$last_name_flag || !$email_flag || !$password_flag || !$username_flag){
           return false;
        }

        $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
        $password_hash =   password_hash($password, PASSWORD_BCRYPT, array('cost' => $hash_cost_factor));

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

        $sql = "INSERT INTO user_personal (first_name,last_name,users_user_id) VALUES ('".$first_name."','".$last_name."','".$user_personal_id."')";
       $this->db->prepare($sql)->execute();

        Session::set('refferer','registration');
        return $result;


    }
    
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    //register with facebook
    public function registerWithFacebook()
    {
        // instantiate the facebook object
        FacebookSession::setDefaultApplication( FACEBOOK_APP_ID,FACEBOOK_APP_SECRET );

        $helper = new FacebookRedirectLoginHelper('http://theambula.lk/registration/registerWithFacebook' );


        try {
            $session = $helper->getSessionFromRedirect();
        } catch( FacebookRequestException $ex ) {
            echo $ex;
        } catch( Exception $ex ) {
            echo $ex;
        }
       
// see if we have a session
        if ($session) {
               
            // graph api request for user data
            $request = new FacebookRequest( $session, 'GET', '/me' );
            $response = $request->execute();
            // get response
            $graphObject = $response->getGraphObject();
            $fbid = $graphObject->getProperty('id');              // To Get Facebook ID
            $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
            $femail = $graphObject->getProperty('email');    // To Get Facebook email ID

            //Session::init();
            Session::set('name',$fbfullname);
            Session::set('username',$femail);
            Session::set('fbid',$fbid);
            Session::set('user_logged_in', true);

            if($this->checkFacebookUIDExistsinDatabase($fbid)){
                return true;
            }else{
                $this->registerNewUserWithFacebook($graphObject);
            }


        }else {
            $loginUrl = $helper->getLoginUrl(array('email'));

          header("Location: ".$loginUrl);
        }

    }

    public function checkFacebookUIDExistsinDatabase($uid=''){
        $query = $this->db->prepare("SELECT user_id FROM users WHERE user_facebook_uid = :user_facebook_uid");
        $query->execute(array(':user_facebook_uid' => $uid));

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
    
     public function checkEmail($email=""){
        $query = $this->db->prepare("SELECT user_email FROM  users  WHERE  user_name = '$email'");
        $query->execute();
        $count =  $query->rowCount();
        if($count >= 1){
            http_response_code(400);
        }else{
            http_response_code(200);
        }

    }

    public function checkUserName($userName=""){
        $query = $this->db->prepare("SELECT  user_name FROM users WHERE  user_name = '$userName'");
        $query->execute();
        $count =  $query->rowCount();
        if($count >= 1){
            http_response_code(400);
        }else{
            http_response_code(200);
        }
    }
} 