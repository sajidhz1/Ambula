<?php

class Controller
{
    protected function __construct(){
        Session::init();

        // user has remember-me-cookie ? then try to login with cookie ("remember me" feature)
        if (!isset($_SESSION['user_logged_in']) && isset($_COOKIE['rememberme'])) {
            header('location: http://localhost/Ambula/login/loginWithCookie');
        }

        // create database connection
        try {
            $this->db = new DataBase();
        } catch (PDOException $e) {
            die('Database connection could not be established.');
        }

    }

	protected function model($model){
	
		require_once 'app/models/' .$model.'.php';
		return new $model($this->db);
	
	}
	
	public function view($view , $data =[]){
       if(file_exists('app/views/'.$view.'.php'))
		     require_once 'app/views/'.$view.'.php';
        else
            require_once 'app/views/_template/error.php';
	}

    /**
     * loads the model with the given name.
     * @param $name string name of the model
     */
    public function loadModel($model)
    {
        $path = 'app/models/' . strtolower($model) . '.php';

        if (file_exists($path)) {

            // The "Model" has a capital letter as this is the second part of the model class name,
            // all models have names like "LoginModel"
            $modelName = $model ;
            // return the new model object while passing the database connection to the model
            return new $model($this->db);
        }
    }

}

?>