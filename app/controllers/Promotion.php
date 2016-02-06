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

    public function addNewPromotion()
    {
        if ($this->promotion->validateAndInsertNewPromo()) {
            $this->view("promotions/promotionSuccessMessage", "promotions");
        } else {
            $this->view('_template/error', "Error");
        }
    }


    public function viewAllPromotions(){
        $promoList = $this->promotion->viewPromotions($_GET["promtoionType"]);
        switch ($_GET["promtoionType"]) {
            case 'restaurant':
                $promotionType = "Restaurents";
                break;
            case 'foodproduct':
                $promotionType = "Food Products";
                break;
            case 'culinary_equipment':
                $promotionType = "Culinary Equipments";
        }
        if (!$promoList) {
            echo "<div style='padding: 20%; padding-top: 10%;' class='col-lg registration-container'>
					<div class='alert alert-info' role='alert' style='text-align:center;'>
						<span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span>
						Currently No Promotions Or Offers are Available on $promotionType
					</div>
				</div>";
        } else {

        }

    }

	public function viewPromotionsTest(){

        $promotion_type = $_POST["promtoionType"];

        $promoList =  json_decode($this->promotion->viewPromotionsTest($promotion_type),true);

        $text="";

        foreach($promoList as $promo){
            $promotionName = $promo['promotion_name'];
            $imageUrl = $promo['image_url'];
            $description = $promo['description'];
            $startDate = $promo['start_date'];
            $endDate = $promo['end_date'];
            $companyName = $promo['company_name'];
            $text = $text."<div class='col-sm-4' xmlns=\"http://www.w3.org/1999/html\">
                                <div class='thumbnail card' style='padding: 15px'>
                                    <img src=/Ambula/$imageUrl alt='' style='width: 170px; height: 150px;'>
                                        <h3 style='overflow-x: hidden'>$promotionName</h3>
                                        <h5 style='overflow-x: hidden'>(Offered By $companyName)</h5>
                                        <p style='display: block; overflow-x: hidden'>$description</p>
                                        <span class='glyphicon glyphicon-calendar' aria-hidden='true'> Starting Date: </span>$startDate</br></br>
                                        <span class='glyphicon glyphicon-calendar' aria-hidden='true'> Ending Date: </span>$endDate</br></br>
                                        <p class='promoViewButton'><a href='#' class='btn btn-primary' role='button'>View Full</a></p>
                                </div>
                            </div>";
        }

        echo $text;

    }
}