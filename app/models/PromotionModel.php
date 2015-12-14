<?php

/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 7/31/2015
 * Time: 11:48 PM
 */
class PromotionModel
{


	public function __construct(DataBase $db)
	{
		$this->db = $db;
		$this->idPromotion_Adder ="";
		$this->idpromo_adderErr ="";
		$this->idpromo_adder_flag = false;
	}

	/*
	public function validateAndInsertPromoAdder()
	{

		$first_name_flag = $last_name_flag = $company_flag = $email_flag = $phone_number_flag = false;
		$first_nameErr = $last_nameErr = $companyErr = $emailErr = $phone_numberErr = "";
		$first_name = $last_name = $company = $email = $phone_number = "";


		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			//firstname validation
			if (empty($_POST["first_name"])) {
				$first_nameErr = "firstName is required";
				$first_name_flag = false;
			} else {
				$first_name_flag = true;
				$first_name = $this->test_input($_POST["first_name"]);
				// check if first name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
					$first_name_flag = false;
					$first_nameErr = "Only letters and white space allowed";
				}
			}

			//lastname validation
			if(empty($_POST["last_name"])){
				$last_nameErr = "last name is required";
				$last_name_flag = false;
			}else{
				$last_name_flag  = true;
				$last_name = $this->test_input($_POST["last_name"]);
				// check if last name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
					$last_name_flag = false;
					$last_nameErr = "Only letters and white space allowed";
				}
			}

			//company validation
			if (empty($_POST["company"])) {
				$companyErr = "Company name is required";
				$company_flag = false;
			} else {
				$company_flag = true;
				$company = $this->test_input($_POST["company"]);
				// check if name only contains letters and whitespace
			}

			//email validation
			if (empty($_POST["email"])) {
				$emailErr = "Email is required";
				$email_flag = false;
			} else {
				$email_flag = true;
				$email = $this->test_input($_POST["email"]);
				// check if e-mail address is well-formed
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$this->flag_log = false;
					$email_flag = false;
					$emailErr = "Invalid email format";
				}
			}

			//email validation
			if (empty($_POST["phone_number"])) {
				$phone_numberErr = "Contatct number is required";
				$phone_number_flag = false;
			} else {
				$phone_number_flag = true;
				$phone_number = $this->test_input($_POST["phone_number"]);
				if (!preg_match("/^\d{3}[\s-]?\d{3}[\s-]?\d{4}$/",$phone_number)) {
					$phone_number_flag = false;
					$last_nameErr = "Enter a valid phone number";
				}
			}


		}

		if(!$first_name_flag || !$last_name_flag || !$company_flag || !$email_flag || !$phone_number){
			return false;
		}

		$hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);

		//insert into promotion_adder table
		$sql = "INSERT INTO promotion_adder (first_name,last_name,company, email, phone_number) VALUES ('".$first_name."','".$last_name."','".$company."','".$email."','".$phone_number."')";
		$this->db->prepare($sql)->execute();
		return $this->db->lastInsertId();
	}
	*/

	public function validateAndInsertNewPromo()
	{

		$this->idpromo_adder_flag = $promo_type_flag = $promo_name_flag = $description_flag = $startdate_flag = $enddate_flag = $priority_flag = false;
		$this->idpromo_adderErr = $promo_typeErr = $promo_nameErr = $promo_imageErr = $descriptionErr = $startdateErr = $enddateErr =  $priorityErr = $datetime_adderdErr = $visibilityErr = "";
		$this->idPromotion_Adder = $promotion_type = $promotion_name = $image_url = $description = $start_date = $end_date =  $priority = $date_time_added = $visibility ="";


		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			if(isset($_SESSION["user_logged_in"]) && $_SESSION["user_account_type"] == 2){
				$this->idPromotion_Adder = $_SESSION["uid"];
				$this->idpromo_adder_flag = true;
			}else{
				$this->idpromo_adder_flag = false;
				$this->idpromo_adderErr = "Not logged in as Coporate user";
			}

			//promo type validation
			if (empty($_POST["promotion_type"])) {
				$promo_typeErr = "Select a promotion type";
				$promo_type_flag = false;
			} else {
				$promo_type_flag = true;
				$promotion_type = $this->test_input($_POST["promotion_type"]);
			}

			//promo name validation
			if(empty($_POST["promotion_name"])){
				$promo_nameErr = "Promotion name is required";
				$promo_name_flag = false;
			}else{
				$promo_name_flag  = true;
				$promotion_name = $this->test_input($_POST["promotion_name"]);
				// check if promo name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z0-9 ]*$/",$promotion_name)) {
					$promo_name_flag = false;
					$promo_nameErr = "Only letters,digits and white spaces allowed";
				}
			}

			//promotional image
			$sqlForId = "SELECT idPromotion FROM promotion ORDER BY idPromotion DESC LIMIT 1";
			$queryId = $this->db->prepare($sqlForId);
			$queryId->execute();
			$lastPromoId = $queryId->fetchColumn();

			if(!$lastPromoId){
				$lastPromoId = 1;
				if (!is_dir("uploads/promotions/" . $lastPromoId)) {
					mkdir("uploads/promotions/" . $lastPromoId);
				}
				$image_url = $this->imageUpload("promo_image", $lastPromoId, 1);
				$lastPromoId = null;
			}else{
				$lastPromoId++;
				if(!is_dir("uploads/promotions/" . $lastPromoId)){
					mkdir("uploads/promotions/" . $lastPromoId);
				}
				$image_url= $this->imageUpload("promo_image", $lastPromoId, 1);
				$lastPromoId = null;
			}

			//promotion description validation
			if (empty($_POST["description"])) {
				$descriptionErr = "Description about the promotion is required";
				$description_flag = false;
			} else {
				$description_flag = true;
				$description = $this->test_input($_POST["description"]);
			}

			//start date
			if (empty($_POST["start_date"])) {
				$startdateErr = "Promotion starting date is required";
				$startdate_flag = false;
			} else {
				$startdate_flag = true;
				$start_date = date('Y-m-d', strtotime($this->test_input($_POST["start_date"])));
			}

			//end date
			if (empty($_POST["end_date"])) {
				$enddateErr = "Promotion finishing date is required";
				$enddate_flag = false;
			} else {
				$enddate_flag = true;
				$end_date = date('Y-m-d', strtotime($this->test_input($_POST["end_date"])));
			}

			//priority
			if (empty($_POST["priority"])) {
				$priorityErr= "priority is required to choose";
				$priority_flag = false;
			} else {
				$priority_flag = true;
				$priority = $this->test_input($_POST["priority"]);
			}

			$visibility = false;

		}

		$hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);

    //    echo $promo_type_flag ." ".$promo_name_flag." ".$company_name_flag." ".$email_flag." ".$image_url." ".$description_flag." ".$startdate_flag." ".$enddate_flag." ".$priority_flag;

		if(!$promo_type_flag || !$promo_name_flag || !$image_url || !$description_flag || !$startdate_flag || !$enddate_flag || !$priority_flag){
			return false;
		}
		//insert into promotion_adder table

        $sql = "INSERT INTO promotion (users_user_id, promotion_type, promotion_name, image_url, description, start_date, end_date, priority, visibility) VALUES ('".$this->idPromotion_Adder."','".$promotion_type."','".$promotion_name."','".$image_url."','".$description."','".$start_date."','".$end_date."','".$priority."','".$visibility."')";
		$this->db->prepare($sql)->execute();
		return $this->db->lastInsertId();

	}

	/*
	public function checkEmailsInAdder($email)
	{
		$sql = "SELECT * FROM promotion_adder WHERE email = ? LIMIT 1";
		$query = $this->db->prepare($sql);
		$query->bindParam(1, $email, PDO::PARAM_STR);
		$query->execute();
		if($query->rowCount() == 0)
		{
			$this->idpromo_adderErr = "you haven't been registered before";
			$this->idpromo_adder_flag = false;
			return $query;
		}else{
			$this->idpromo_adder_flag = true;
			$this->idPromotion_Adder = $query->fetchColumn();
			return $query;
		}
	}
	*/

	//This function is used to check whether a logged in user is a personal or a corporate user
	//user type is returned to Promotion Controller wheich is called by checkUserType() method
	/*public function userType($userId)
	{
		$sql = "SELECT user_account_type FROM users WHERE user_id = ?";
		$query = $this->db->prepare($sql);
		$query->bindParam(1,$userId, PDO::PARAM_STR);
		$query->execute();

		if($query->rowCount() == 0){
			return $query;
		}else{
			return $query;
		}

	}*/

	public function viewPromotions($promotion_type)
	{
		$sql = "SELECT * FROM promotion WHERE promotion_type = ?";
		$query = $this->db->prepare($sql);
		$query->bindParam(1, $promotion_type, PDO::PARAM_STR);
		$query->execute();

		if($query->rowCount() == 0)
		{
			return false;
		}else{
			return $query;
		}
	}

	public function viewPromotionCompany($uId){
		$sql = "SELECT company_name FROM commercial_user WHERE users_user_id = ?";
		$query = $this->db->prepare($sql);
		$query->bindParam(1,$uId, PDO::PARAM_STR);
		$query->execute();

		if($query->rowCount() == 0)
		{
			return false;
		}else{
			return $query;
		}
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	public function imageUpload($name ,$path ,$type)
	{

		$target_dir = "uploads/promotions/" . $path . "/";
		$target_file = $target_dir . basename($_FILES[$name]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if (isset($_POST["promo_image"])) {
			echo "testing upload";
			$check = getimagesize($_FILES[$name]["tmp_name"]);
			if ($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			echo $target_file;
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES[$name]["size"] > 1000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif"
		) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			return false;
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
				return $target_file;
			} else {
				return false;
			}
		}
	}

}