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
        $this->promotion->validateAndInsertNewPromo();
    }

    public function promotionSuccess()
    {
        $this->view('promotions/promotionSuccessMessage');
    }

    public function viewAllPromotions()
    {
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

    //==================================================Now implemented=======================================//

    public function viewPromotionsTest()
    {

        $promotion_type = $_POST["promotoionType"];

        $promoList = json_decode($this->promotion->viewPromotionsTest($promotion_type), true);

        $text = "";

        foreach ($promoList as $promo) {
            $promotionId = $promo['idPromotion'];
            $promotionName = $promo['promotion_name'];
            $imageUrl = $promo['image_url'];
            $description = $promo['description'];
            $startDate = $promo['start_date'];
            $endDate = $promo['end_date'];
            $companyName = $promo['company_name'];
            /*$text = $text."<div class='col-sm-4' xmlns=\"http://www.w3.org/1999/html\">
                                <div class='thumbnail card' style='padding: 15px'>
                                    <img src=/Ambula/$imageUrl alt='' style='width: 170px; height: 150px;'>
                                    <h3 style='overflow-x: hidden'>$promotionName</h3>
                                    <h5 style='overflow-x: hidden'>(Offered By $companyName)</h5>
                                    <p style='display: block; overflow-x: hidden'>$description</p>
                                    <span class='glyphicon glyphicon-calendar' aria-hidden='true'> Starting Date: </span>$startDate</br></br>
                                    <span class='glyphicon glyphicon-calendar' aria-hidden='true'> Ending Date: </span>$endDate</br></br>
                                    <p class='promoViewButton'><a href='#' class='btn btn-primary' role='button'>View Full</a></p>
                                </div>
                            </div>";*/

            $text = $text . "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 singlePromo'  id='$promotionId' >

                                    <div class='hovereffect'>

                                        <img class='img-responsive' src='/Ambula/$imageUrl' alt=''>
                                        <div class='overlay'>
                                           <h2>$promotionName</h2>
                                           <a class='info' href='#'>$companyName</a>
                                        </div>
                                    </div>
                                </div>
                                ";
        }

        echo $text;

    }

    //to display information about a single promotion on a modal when a promotion tile is clicked
    public function viewSinglePromotion()
    {

        $promoId = $_POST["promotoionId"];

        /*$singlePromotion = json_decode($this->promotion->viewSinglePromotion($promoId), true);
        $promoId = $singlePromotion[0]['idPromotion'];
        $imageUrl = $singlePromotion[0]['image_url'];
        $description = $singlePromotion[0]['description'];
        $startDate = $singlePromotion[0]['start_date'];
        $endDate = $singlePromotion[0]['end_date'];

        $text = "<div class='modal fade' id='promoViewModal' role='dialog'>
                    <div class='modal-dialog'>
                        <!-- Modal content-->
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                <h4 class='modal-title'>$promoId</h4>
                            </div>
                            <div class='modal-body'>
                                <p>$description</p>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                            </div>
                        </div>
                    </div>
                </div>";

        echo $text;*/

        echo $this->promotion->viewSinglePromotion($promoId);


    }

    public function error_page()
    {
        $this->view('_template/error');
    }

}