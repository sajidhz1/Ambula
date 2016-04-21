<?php

/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 7/31/2015
 * Time: 11:49 PM
 */
class promotion extends Controller
{
    protected $promotion;

    public function __construct()
    {
        parent:: __construct();
        $this->promotion = $this->model('PromotionModel');
    }

    public function index()
    {
        $this->view('promotions/viewPromotions');
    }

    public function newPromotion()
    {
        if(isset($_SESSION['user_logged_in']) && isset($_SESSION['uid']) && isset($_SESSION['coporate_user_id'])){
            $this->view('promotions/newPromotion');
        }else{
            ob_start();
            header('Location: /Ambula/login');
            ob_end_flush();
            die();
        }
    }


    public function addNewPromotion()
    {
        echo $this->promotion->validateAndInsertNewPromo();
    }

    //==================================================Now implemented=======================================//

    public function viewAllPromotions()
    {

        $promotion_type = $_POST["promotoionType"];

        $promoList = json_decode($this->promotion->viewAllPromotions($promotion_type), true);

        $text = "";

        foreach ($promoList as $promo) {
            $promotionId = $promo['idPromotion'];
            $promotionName = $promo['promotion_name'];
            $imageUrl = $promo['image_url'];
            $description = $promo['description'];
            $startDate = $promo['start_date'];
            $endDate = $promo['end_date'];
            $companyName = $promo['company_name'];
            $target_file = 'uploads/promotions/'.$promotionId.'/'.$promotionId;
            $matching = glob($target_file . '.*');

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

                                        <img class='img-responsive' src='/Ambula/$matching[0]' alt=''>
                                        <div class='overlay'>
                                           <h2>$promotionName</h2>
                                           <a class='info' href=''>$companyName</a>
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
        echo $this->promotion->viewSinglePromotion($promoId);
    }

    public function error_page()
    {
        $this->view('_template/error');
    }

}