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
            if (isset($_SESSION['username']) && ($_SESSION['user_account_type'] == 1 || $_SESSION['user_account_type'] == 3)) {
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
                }

            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    //This method is used to check whether the typed in password matches the current user password in the db
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


}