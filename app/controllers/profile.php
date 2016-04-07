<?php

/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 2/27/2016
 * Time: 11:10 PM
 */
class profile extends Controller
{

    public $user_name;
    protected $user;
    protected $profile;

    public function __construct()
    {
        parent:: __construct();
        $this->user = $this->model('HomeModel');
        $this->profile = $this->model("ProfileModel");

    }

    ////=============Normal user Profile===============///

    public function index($user = '')
    {
        //echo $_GET['user'];
        if (isset($_SESSION["user_logged_in"]) && $_SESSION["user_logged_in"] == true && isset($_SESSION["username"])) {
            if ($this->user->checkUserExistAndGetType($user) != '') {
                if ($this->user->checkUserExistAndGetType($user)->user_account_type == 1) {
                    $this->user_name = $user;
                    $this->view('user_profile/normal_user_profile');
                } else if ($this->user->checkUserExistAndGetType($user)->user_account_type == 3) {
                    $this->user_name = $user;
                    $this->view('user_profile/normal_user_profile');
                } else if ($this->user->checkUserExistAndGetType($user)->user_account_type == 2) {
                    $this->user_name = $user;
                    $this->view('user_profile/cooperate_user_updated');
                }
            } else {
                $this->view('_template/error');
            }
        } else {
            Header('Location:/Ambula/login/');
        }
    }

    //method call to HomeModel to view User First, Last Names and pic
    public function getUser()
    {
        return $this->user->getUser($this->user_name);
    }

    //method call to HomeModel To view Recipes
    public function getRecipesByUser($userId = '')
    {
        return $this->user->getRecipesByUser($userId);
    }

    public function viewNormalUserInfo()
    {
        echo $this->profile->viewNormalUserInfo();
    }

    ////=============Common user function ================///

    //update the profile picture
    public function updateProfilePicture()
    {
        echo $this->profile->updateProfilePicture();
    }

    //update password method for every user through their respective profiles
    public function updatePassword()
    {
        echo $this->profile->updatePassword();
    }

    //This method is used to check whether the typed in password matches the current user password in the db
    public function  checkPassword()
    {
        $this->profile->checkPassword($_GET['curr_password']);
    }

    //Method for updating user fields
    public function updateUserField()
    {
        echo $this->profile->updateUserField();
    }

    //Function to refresh the single user field which was jus updated
    public function refreshUserField()
    {
        echo $this->profile->refreshUserField();
    }

    ///====================================================///


    ////=============Cooperate user Profile===============///

    public function getCooperateUserDetails()
    {
        return $this->profile->getCooperateUserDetails($this->user_name);
    }

    //To view all the promotions by a single commercial user
    public function getAllPromotionsByUser($user_name = "")
    {
        return $this->profile->getAllPromotionsByUser($user_name);
    }

    //To view all the recipes by a single commercial user
    public function getAllRecipesByUser($user_name = "")
    {
        return $this->profile->getAllRecipesByUser($user_name);
    }

    //To view which categories of food does a commercial user deals in
    public function getCategoriesByUser($user_name = "")
    {
        return $this->profile->getCategoriesByUser($user_name);
    }

    public function error_page()
    {
        $this->view('_template/error');
    }
}