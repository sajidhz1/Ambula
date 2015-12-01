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
        $this->view('Registration/registration');
    }


    public function registerNewUser()
    {
        if($this->registration->validateFields() == 1){
            Header('Location:http:/login');
        }else{
            Header('Location:http:/registration');
        }
    }

    public function registerWithFacebook()
    {

        if ($this->registration->registerWithFacebook()) {
            Header('Location:'.URL);
        }else{

        }

    }
     public function checkEmail(){
        $this->registration->checkEmail($_GET['email']);
    }

    public function  checkUserName(){
        $this->registration->checkUserName($_GET['username']);
    }
} 