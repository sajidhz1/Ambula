<?php

/**
 * Created by PhpStorm.
 * User: sajidhz
 * Date: 1/7/2015
 * Time: 12:15 PM
 */
class Registration extends Controller
{

    protected $registration;


    public function __construct()
    {

        parent::__construct();
        $this->registration = $this->model('RegistrationModel');

    }

    public function index($name = '')
    {
        if(isset($_GET['user_type']) && $_GET['user_type'] == "commercial_user" && isset($_SESSION['username']) && $this->registration->checkCooperateUserName($_SESSION['username'])){

            $this->view('Registration/commercial_user_continue');
        } else if (isset($_GET['user_type']) && $_GET['user_type'] == "commercial_user"){
            $this->view('Registration/commercial_user_registration');
        } else{
            $this->view('Registration/registration');
        }
    }

    public function regNewCommercialUser()
    {
        $this->view('Registration/commercial_user_registration');
    }

    public function registerNewUser()
    {
        if ($this->registration->validateFields() == 1) {
            Header('Location:http:/Ambula/login');
        } else {
            Header('Location:http:/Ambula/registration');
        }
    }

    public function registerWithFacebook()
    {

        if ($this->registration->registerWithFacebook()) {
            Header('Location:' . URL);
        } else {

        }

    }

    public function checkEmail()
    {
        $this->registration->checkEmail($_GET['email']);
    }

    public function  checkUserName()
    {
        $this->registration->checkUserName($_GET['username']);
    }



    public function register_commercial_user(){
        if($this->registration->register_commercial_user()){
            Header('Location:http:/Ambula/registration/?user_type=commercial_user');
        }else{

            Header('Location:http:/Ambula/registration/?user_type=commercial_user');
        }
    }

    public function update_commercial_user()
    {
        if ($this->registration->update_commercial_user()) {
            Header('Location:http:/Ambula/login');
        } else {
            $this->view("_template/error");
        }
    }

    public function loadCategories()
    {
        return $this->registration->loadCategories();
    }

} 