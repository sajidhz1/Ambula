<?php

/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 2/27/2016
 * Time: 11:10 PM
 */
class ProfileController extends Controller
{

    protected $profile;

    public function __construct()
    {
        parent:: __construct();
        $this->profile = $this->model("ProfileModel");

    }

    public function viewNormalUserInfo()
    {
        echo $this->profile->viewNormalUserInfo();
    }

    public function updateUserField()
    {
        echo $this->profile->updateUserField();
    }

    //This method is used to check whether the typed in password matches the current user password in the db
    public function  checkPassword()
    {
        $this->profile->checkPassword($_GET['curr_password']);
    }

    //update password method for every user through their respective profiles
    public function updatePassword()
    {
        echo $this->profile->updatePassword();
    }


}