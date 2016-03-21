<?php

class LoginModel
{

    public function __construct(DataBase $db)
    {
        $this->db = $db;
    }


    public function userLogin()
    {

        $sth = $this->db->prepare("SELECT user_id,
                                          user_name,
                                          user_email,
                                          user_password_hash,
                                          user_avatar,
                                          user_provider_type,
                                          user_account_type
                                   FROM   users
                                   WHERE  (user_name = :user_name OR user_email = :user_email)
                                          AND user_provider_type = :provider_type");
        $sth->execute(array(':user_name' => $_POST['username'], ':user_email' => $_POST['username'], ':provider_type' => 'DEFAULT'));
        $count = $sth->rowCount();

        if ($count == 1) {

            $result = $sth->fetch();

            if (password_verify($_POST['password'], $result->user_password_hash)) {

                Session::init();
                Session::set('uid', $result->user_id);
                Session::set('username', $result->user_name);
                Session::set('user_provider_type', $result->user_provider_type);
                Session::set('user_logged_in', true);
                Session::set('user_avatar', $result->user_avatar);
                Session::set('user_account_type', $result->user_account_type);
                Session::set('user_email', $result->user_email);

                if ($result->user_account_type == 2) {
                    $st = $this->db->prepare("SELECT company_name ,idcommercial_user
                                   FROM   commercial_user
                                   WHERE  users_user_id = '" . $result->user_id . "'");
                    $st->execute();
                    $user_details = $st->fetch();
                    Session::set('user_avatar', 1);
                    Session::set('name', $user_details->company_name);
                    Session::set('coporate_user_id', $user_details->idcommercial_user);
                    Session::set('user_avatar_url', "http://localhost/Ambula/uploads/profile/commercial_user/" . $result->user_name . "/" . $result->user_name . ".jpg");

                } else {
                    $st = $this->db->prepare("SELECT first_name,
                                          last_name
                                   FROM   user_personal
                                   WHERE  users_user_id = '" . $result->user_id . "'");
                    $st->execute();
                    $user_details = $st->fetch();
                    Session::set('name', $user_details->first_name . ' ' . $user_details->last_name);
                    Session::set('user_avatar_url', "http://localhost/Ambula/uploads/profile/personal_user/" . $result->user_id . "/" . $result->user_id . ".thumb.jpg");
                }

                // if user has checked the "remember me" checkbox, then write cookie
                if (isset($_POST['remember'])) {

                    // generate 64 char random string
                    $random_token_string = hash('sha256', mt_rand());

                    // write that token into database
                    $sql = "UPDATE users SET user_rememberme_token = :user_rememberme_token WHERE user_id = :user_id";
                    $sth = $this->db->prepare($sql);
                    $sth->execute(array(':user_rememberme_token' => $random_token_string, ':user_id' => $result->user_id));

                    // generate cookie string that consists of user id, random string and combined hash of both
                    $cookie_string_first_part = $result->user_id . ':' . $random_token_string;
                    $cookie_string_hash = hash('sha256', $cookie_string_first_part);
                    $cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;

                    // set cookie
                    setcookie('rememberme', $cookie_string, time() + COOKIE_RUNTIME, "/", COOKIE_DOMAIN);
                }

                return true;


            } else {
                Session::set("feedback_negative", "invalid Username or Password");
                return false;
            }
        } else {
            Session::set("feedback_negative", "invalid Username or Password");
            return false;
        }
    }

    public function loginWithCookies()
    {
        $cookie = isset($_COOKIE['rememberme']) ? $_COOKIE['rememberme'] : '';


        // do we have a cookie var ?
        if (!$cookie) {
            $_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID;
            return false;
        }

        // check cookie's contents, check if cookie contents belong together
        list ($user_id, $token, $hash) = explode(':', $cookie);
        if ($hash !== hash('sha256', $user_id . ':' . $token)) {
            $_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID;
            return false;
        }

        // do not log in when token is empty
        if (empty($token)) {
            $_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID;
            return false;
        }

        // get real token from database (and all other data)
        $query = $this->db->prepare("SELECT user_id, user_name, user_email, user_password_hash, user_active,
                                          user_account_type,  user_avatar,  user_last_failed_login , user_personal_iduser_personal
                                     FROM users
                                     WHERE user_id = :user_id
                                       AND user_rememberme_token = :user_rememberme_token
                                       AND user_rememberme_token IS NOT NULL
                                       AND user_provider_type = :provider_type");
        $query->execute(array(':user_id' => $user_id, ':user_rememberme_token' => $token, ':provider_type' => 'DEFAULT'));
        $count = $query->rowCount();
        if ($count == 1) {
            // fetch one row (we only have one result)
            $result = $query->fetch();
            $st = $this->db->prepare("SELECT first_name,
                                          last_name
                                   FROM   user_personal
                                   WHERE  iduser_personal = '" . $result->user_personal_iduser_personal . "'");
            $st->execute();
            $user_details = $st->fetch();

            // TODO: this block is same/similar to the one from login(), maybe we should put this in a method
            // write data into session
            Session::init();
            Session::set('user_logged_in', true);
            Session::set('uid', $result->user_id);
            Session::set('name', $user_details->first_name . ' ' . $user_details->last_name);
            Session::set('username', $result->user_name);
            Session::set('user_email', $result->user_email);
            Session::set('user_account_type', $result->user_account_type);
            Session::set('user_provider_type', 'DEFAULT');
            // Session::set('user_avatar_file', $this->getUserAvatarFilePath());
            // call the setGravatarImageUrl() method which writes gravatar urls into the session
            //$this->setGravatarImageUrl($result->user_email, AVATAR_SIZE);

            // generate integer-timestamp for saving of last-login date
            $user_last_login_timestamp = time();
            // write timestamp of this login into database (we only write "real" logins via login form into the
            // database, not the session-login on every page request
            $sql = "UPDATE users SET user_last_login_timestamp = :user_last_login_timestamp WHERE user_id = :user_id";
            $sth = $this->db->prepare($sql);
            $sth->execute(array(':user_id' => $user_id, ':user_last_login_timestamp' => $user_last_login_timestamp));

            // NOTE: we don't set another rememberme-cookie here as the current cookie should always
            // be invalid after a certain amount of time, so the user has to login with username/password
            // again from time to time. This is good and safe ! ;)
            $_SESSION["feedback_positive"][] = FEEDBACK_COOKIE_LOGIN_SUCCESSFUL;
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID;
            return false;
        }
    }

    public function deleteCookie()
    {
        // set the rememberme-cookie to ten years ago (3600sec * 365 days * 10).
        // that's obviously the best practice to kill a cookie via php
        // @see http://stackoverflow.com/a/686166/1114320
        setcookie('rememberme', false, time() - (3600 * 3650), '/', COOKIE_DOMAIN);
    }

    public function userLogout()
    {
        if (Session::destroy()) {
            return true;
        } else {
            return false;
        }

    }

    public function verify()
    {

    }

    public function sendPasswordResetEmail()
    {

        $sth = $this->db->prepare("SELECT user_id ,
                                          user_email ,
                                          user_provider_type
                                   FROM   users
                                   WHERE   user_email = :user_email
                                          AND user_provider_type = :provider_type");
        $sth->execute(array(':user_email' => $_POST['useremail'], ':provider_type' => 'DEFAULT'));
        $count = $sth->rowCount();

        if ($count == 1) {
            $result = $sth->fetch();
            $hash = md5(rand(0, 1000));

            $sql2 = $this->db->prepare('UPDATE users SET user_password_reset_hash = :user_password_reset_hash WHERE user_id =' . $result->user_id);
            $sql2->execute(array(':user_password_reset_hash' => $hash));
            $to = $result->user_email; // Send email to our user
            $subject = 'Password Reset | The Ambula'; // Give the email a subject
            $message = '


        Please click this link to reset your password:
        http://theambula.lk/login/passwordReset?email=' . $to . '&h=' . $hash . '

        '; // Our message above including the link

            $headers = 'From:noreply@theambula.lk' . "\r\n"; // Set from headers
            mail($to, $subject, $message, $headers); // Send our email

            return 1;
        } else {
            return 0;
        }

    }

    public function changePassword()
    {

        $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
        $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => $hash_cost_factor));

        $sql2 = $this->db->prepare('UPDATE users SET user_password_hash = :user_password_hash , user_password_reset_timestamp = :user_password_reset_timestamp WHERE user_email = :user_email AND user_password_reset_hash = :user_password_reset_hash');
        $result = $sql2->execute(array(':user_password_reset_hash' => $_GET['h'], ':user_email' => $_GET['email'], ':user_password_hash' => $password_hash, ':user_password_reset_timestamp' => time()));


        $sql1 = $this->db->prepare('UPDATE users SET user_password_reset_hash = :user_password_reset_hash WHERE user_email = :user_email');
        $result2 = $sql1->execute(array(':user_password_reset_hash' => '', ':user_email' => $_GET['email']));


        return $result2;

    }

    public function checkHash()
    {

        $sql0 = $this->db->prepare('SELECT user_password_reset_hash,user_email FROM users WHERE user_email = :user_email');
        $sql0->execute(array(':user_email' => $_GET['email']));

        $count = $sql0->rowCount();

        if ($count != 1) {
            return 2;

        } else {

            $result = $sql0->fetch();

            if ($result->user_password_reset_hash != null) {

                return 1;

            } else {
                //password_reset link expired
                return 2;
            }
        }

    }


} 