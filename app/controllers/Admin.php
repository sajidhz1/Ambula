<?php
/**
 * Created by PhpStorm.
 * User: sajidhz
 * Date: 1/10/2016
 * Time: 11:03 AM
 */

class Admin extends Controller{

    protected $admin;

    function __construct(){
        parent::__construct();
        //$this->admin = $this->model('HomeModel');

    }

    public function index($name =''){

        // $this->user->checkLogin();
        $this->view('admin/admin_home',[]);

    }

} 