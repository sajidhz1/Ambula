<?php

/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 2/27/2016
 * Time: 11:09 PM
 */
class ProfileModel
{

    public function __construct(DataBase $db)
    {
        $this->db = $db;
    }

    public function viewNormalUserInfo()
    {

        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) {
            if (isset($_SESSION['username']) && ($_SESSION['user_account_type'] == 1 || $_SESSION['user_account_type'] == 3)) {
                $sql = "SELECT * FROM users ,user_personal WHERE users_user_id = user_id AND user_name = '" . $_SESSION["username"] . "'";
                $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                return json_encode($result);
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function updateUserField()
    {
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) {
            if (isset($_SESSION['username']) && ($_SESSION['user_account_type'] == 1 || $_SESSION['user_account_type'] == 3 || $_SESSION['user_account_type'] == 2)) {
                $table = $_POST['user_table_type'];
                $column = $_POST['user_detail_column'];
                if ($table == 'users') {
                    $sql = "UPDATE " . $table . " SET " . $column . "= :user_value WHERE user_id = :logged_in_user";
                    $result = $this->db->prepare($sql);
                    return $result->execute(array(':user_value' => $_POST['user_value'], ':logged_in_user' => $_SESSION['uid']));
                } else if ($table == 'user_personal') {
                    $sql = "UPDATE " . $table . " SET " . $column . "= :user_value WHERE users_user_id = :logged_in_user";
                    $result = $this->db->prepare($sql);
                    return $result->execute(array(':user_value' => $_POST['user_value'], ':logged_in_user' => $_SESSION['uid']));
                } else if ($table == 'commercial_user') {
                    $sql = "UPDATE " . $table . " SET " . $column . "= :user_value WHERE users_user_id = :logged_in_user";
                    $result = $this->db->prepare($sql);
                    return $result->execute(array(':user_value' => $_POST['user_value'], ':logged_in_user' => $_SESSION['uid']));
                }

            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    //This method is used to check whether the typed in password matches the current user password in the db
    public function updatePassword()
    {
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true && isset($_SESSION['username'])) {

            $loggedInUser = $_SESSION['uid'];
            $currPassword = $_POST['curr_password'];
            $newPassword = $_POST['new_password'];
            $currTime = time();
            if ($this->checkPassword($currPassword)) {
                $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
                $password_hash = password_hash($newPassword, PASSWORD_BCRYPT, array('cost' => $hash_cost_factor));
                $sql = "UPDATE users SET user_password_hash = :user_password_hash , user_password_reset_timestamp = :user_password_reset_timestamp WHERE user_id = :user_id";
                $query = $this->db->prepare($sql);
                $result = $query->execute(array(':user_password_hash' => $password_hash, ':user_password_reset_timestamp' => $currTime, ':user_id' => $loggedInUser));
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function checkPassword($currPassword = "")
    {
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true && isset($_SESSION['username'])) {
            $loggedInUser = $_SESSION['uid'];
            $sql = "SELECT user_password_hash FROM users WHERE  user_id = :user_id";
            $query = $this->db->prepare($sql);
            $query->execute(array('user_id' => $loggedInUser));
            $result = $query->fetch();
            if (password_verify($currPassword, $result->user_password_hash)) {
                http_response_code(200);
                return true;
            } else {
                http_response_code(400);
                return false;
            }
        } else {
            http_response_code(400);
            return false;
        }
    }

    public function updateProfilePicture()
    {
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true && isset($_SESSION['username'])) {

            $loggedInUserId = $_SESSION['uid'];
            $loggedInUserType = $_SESSION['user_account_type'];
            $name = "upload_input"; //name attribute value of the input field

            if ($loggedInUserType == 2) {
                $target_dir = "uploads/profile/commercial_user/" . $loggedInUserId . "/";
            } else {
                $target_dir = "uploads/profile/personal_user/" . $loggedInUserId . "/";
            }

            //To create the directory if its not created already
            $uploadOk = mkdir($target_dir);

            $target_file = $target_dir . basename($_FILES[$name]["name"]);
            $uploadOk = 1;

            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES[$name]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES[$name]["size"] > 3000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                return false;
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_dir . $loggedInUserId . '.' . $imageFileType)) {

                    $this->make_thumb($target_dir . $loggedInUserId . '.' . $imageFileType, $target_dir . $loggedInUserId . '.card.jpg', 500);
                    $this->make_thumb($target_dir . $loggedInUserId . '.' . $imageFileType, $target_dir . $loggedInUserId . '.thumb.jpg', 200);

                    //Data base update query for updating the column of user avatar availability//
                    $sql = "UPDATE users SET user_avatar = :user_avatar WHERE user_id = :logged_in_user";
                    $result = $this->db->prepare($sql);
                    $result->execute(array(':user_avatar' => 1, ':logged_in_user' => $_SESSION['uid']));
                    return true;
                } else {
                    return false;
                }
            }

        } else {
            return false;
        }
    }

    //create thumbnail
    function make_thumb($src, $dest, $desired_width)
    {

        /* read the source image */
        $what = getimagesize($src);

        switch (strtolower($what['mime'])) {
            case 'image/png':
                $img = imagecreatefrompng($src);
                break;
            case 'image/jpeg':
                $img = imagecreatefromjpeg($src);
                break;
            case 'image/gif':
                $img = imagecreatefromgif($src);
                break;
            default:
                die();
        }

        $width = imagesx($img);
        $height = imagesy($img);

        /* find the "desired height" of this thumbnail, relative to the desired width  */
        $desired_height = floor($height * ($desired_width / $width));

        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $img, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

        /* create the physical thumbnail image to its destination */
        imagejpeg($virtual_image, $dest);
    }


    ////=============Cooperate user Profile===============///

    public function  getCooperateUserDetails($user_name = '')
    {
        $array = $this->db->query("SELECT commercial_user.*, users.user_name,users.user_email, users.user_avatar, users.user_id FROM users, commercial_user WHERE users.user_id = commercial_user.users_user_id AND users.user_name = '$user_name'")->fetch();
        return json_encode($array);
    }

    public function getAllPromotionsByUser($user_name = "")
    {

        $sql = $this->db->query("SELECT promotion.*,users.user_name  FROM users,promotion WHERE users_user_id = users.user_id AND user_name ='$user_name'")->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($sql);
    }

    public function getAllRecipesByUser($user_name = "")
    {

        $sql = $this->db->query("SELECT recipes.*,users.user_name  FROM users,recipes WHERE users_user_id = users.user_id AND user_name ='$user_name'")->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($sql);
    }

    public function getCategoriesByUser($user_name = "")
    {

        $sql = "SELECT cat.id_product_categories, cat.title FROM product_categories AS cat JOIN (SELECT cupc.Product_categories_id_product_categories FROM cooperate_user_has_product_categories AS cupc, (SELECT com.idcommercial_user FROM commercial_user AS com, (SELECT user_id FROM users WHERE user_name = :user_name) AS user WHERE com.users_user_id = user.user_id) AS comuser WHERE cupc.cooperate_user_id = comuser.idcommercial_user) AS ids WHERE cat.id_product_categories=ids.Product_categories_id_product_categories";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_name'=>$user_name));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }


    /*=====================================================================*/

    public function refreshUserField()
    {
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) {
            if (isset($_SESSION['username']) && ($_SESSION['user_account_type'] == 1 || $_SESSION['user_account_type'] == 3 || $_SESSION['user_account_type'] == 2)) {
                $table = $_POST['userTable'];
                $column = $_POST['userColumn'];
                if ($table == 'users') {
                    $sql = "SELECT " . $column . " FROM " . $table . "WHERE user_id = :logged_in_user";
                    $query = $this->db->prepare($sql);
                    $query->execute(array(':logged_in_user' => $_SESSION['uid']));
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    return json_encode($result);
                } else {
                    $sql = "SELECT " . $column . " FROM " . $table . " WHERE users_user_id = :logged_in_user";
                    $query = $this->db->prepare($sql);
                    $query->execute(array(':logged_in_user' => $_SESSION['uid']));
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    return json_encode($result);
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}