<?php


class Login extends Controller{

    protected $login;



    public function __construct(){

        parent::__construct();
       $this->login = $this->model('LoginModel');
    }

    public function index($name = ''){


      //  $this->loadModel('LoginModel')->login();
        if(!Session::get('user_logged_in'))
            $this->view('login/Login',['name' => 'sajidh']);
        else
            header('location:http://localhost/Ambula/');
    }

    public function success(){
        $this->view('login/change_password_success');
    }

    public function login(){

        if(isset($_SERVER['HTTP_REFERER'])){
            Session::set('page_rdr',$_SERVER['HTTP_REFERER']);
        }
        if($this->login->userLogin()){
            Header('Location:'.Session::get('page_rdr'));
        }
        else{
            Header('Location:http://localhost/Ambula/login/');
        }
    }

    //validate and show password reset view
    public function passwordReset(){

        if(isset($_GET['email']) &&  isset($_GET['h'])) {
            if ($this->login->checkHash() == 1) {


                $this->view('login/change_new_password');


            } else if ($this->login->checkHash() == 2) {
                Header('Location: /Ambula/login/success?reset_link_expired');
            }
        } else{

                $this->view('login/password_reset');

        }
    }

    //change password in db
    public function changePassword(){

        //check whether the hash is available in db
        if(isset($_GET['email']) &&  isset($_GET['h'])) {
            if ($this->login->changePassword() == 1) {
                Header('Location: /Ambula/login/success?password_changed');
            } else {
                //handle
            }
        }
    }

    //sends reset password email
    public function sendPasswordResetEmail(){

        if($this->login->sendPasswordResetEmail() == 1){
            Header('Location: /Ambula/login/success?email_sent');
        }else{
            //handle
        }


    }

    function loginWithCookie()
    {
        // run the loginWithCookie() method in the login-model, put the result in $login_successful (true or false)

        $login_successful = $this->login->loginWithCookies();

        if ($login_successful) {
            header('location: /');
        } else {
            // delete the invalid cookie to prevent infinite login loops
            $this->login->deleteCookie();
            // if NO, then move user to login/index (login form) (this is a browser-redirection, not a rendered view)
            header('location: ' . URL . 'login/index');
        }
    }

    public function logout(){

        if($this->login->userLogout()){
            header('location:http://localhost/Ambula/');
        }
    }

    //error page
    public function error_page(){
        $this->view('_template/error');
    }

    public function verify(){
        $this->login->verify();
    }
} 