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
            header('location:/');

    }

    public function login(){

        if(isset($_SERVER['HTTP_REFERER'])){
            Session::set('page_rdr',$_SERVER['HTTP_REFERER']);
        }
        if($this->login->userLogin()){
            Header('Location:'.Session::get('page_rdr'));
        }
        else{
            Header('Location:/login/');
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

        if($this->login->userLogout())
            Header('Location:/');
    }

    //error page
    public function error_page(){
        $this->view('_template/error');
    }
} 