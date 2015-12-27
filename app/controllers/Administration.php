<?php
/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 12/19/2015
 * Time: 10:35 AM
 */

class Administration extends Controller{

	protected $admin;

	public function __construct(){

	}

	public function index(){
		$this->view("administration/adminProfile");
	}

}
?>