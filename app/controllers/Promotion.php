<?php

/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 7/31/2015
 * Time: 11:49 PM
 */
class Promotion extends Controller
{
	protected $promotion;

	public function __construct()
	{
		parent:: __construct();
		$this->promotion = $this->model('PromotionModel');
	}

	public function index()
	{
		$this->view('promotions/newPromotions');
	}

	public function viewNewPromoAdderForm()
	{
		$this->view('promotions/promotionAdderForm');
	}

	public function addPromotionAdder()
	{
		if($this->promotion->validateAndInsertPromoAdder() != false){
			$this->view('promotions/promotionAdderSuccess');
		}else{
			$this->view('promotions/promotionAdderForm');
		}
	}

	public function addNewPromotion()
	{
		$this->promotion->validateAndInsertNewPromo();
	}

	public function checkEmailsInPromoAdder()
	{
		$id = $this->promotion->checkEmailsInAdder($_POST["email"]);
		if($id->rowCount() == 0)
		{
			$emailAvail = false;
		}else{
			$emailAvail = true;
		}
		echo json_encode($emailAvail);
	}

	public function viewAllPromotions()
	{
		$promoList = $this->promotion->viewPromotions($_GET["promtoionType"]);
		switch($_GET["promtoionType"])
		{
			case 'restaurant': $promotionType = "Restaurents";
				break;
			case 'foodproduct': $promotionType = "Food Products";
				break;
			case 'culinary_equipment': $promotionType = "Culinary Equipments";
		}
		if(!$promoList)
		{
			echo"<div style='padding: 20%; padding-top: 10%;' class='col-lg registration-container'>
					<div class='alert alert-info' role='alert' style='text-align:center;'>
						<span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span>
						Currently No Promotions Or Offers are Available on $promotionType
					</div>
				</div>";
		}else{
			while ($row = $promoList->fetch(PDO::FETCH_ASSOC)) {
				$promotionName = $row['promotion_name'];
				$companyName = $row['company_name'];
				$imageUrl = "/Ambula/".$row['image_url'];
				$description =$row['description'];
				$startDate = $row['start_date'];
				$endDate = $row['end_date'];
				echo "<div class='col-sm-6 col-md-4' xmlns=\"http://www.w3.org/1999/html\">
						<div class='thumbnail'>
							<img src=http://localhost/Ambula/$imageUrl alt='...' style='width: 170px; height: 150px;'>
							<br class='caption'>
								<h3 style='display: inline'>$promotionName</h3><h5 style='display: inline;'>(offered by $companyName)</h5>
								<p>$description</p>
								<span class='glyphicon glyphicon-calendar' aria-hidden='true'> Starting Date:</span>$startDate</br></br>
								<span class='glyphicon glyphicon-calendar' aria-hidden='true'> Ending Date:</span>$endDate</br></br>
								<p class='promoViewButton'><a href='#' class='btn btn-primary' role='button'>View Full</a></p>
							</div>
						</div>
					</div>";
			}
		}
	}
}