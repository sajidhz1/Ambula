<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="=/Ambula/public/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/Ambula/public/css/slider.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- fav icon -->
    <link rel="icon" href="/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/jquery.leanModal.min.js"></script>

    <script type="text/javascript" src="/Ambula/public/js/typeahead.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/typeahead.js"></script>

    <script src="http://localhost/Ambula/public/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="/Ambula/public/css/style.css"/>

    <link href="/Ambula/public/js/promotion/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="/Ambula/public/js/promotion/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/promotion/promotionJavaScriptCustom.js"></script>


    <!--[if lt IE 9]>
    <script src="css/font-awesome-ie7.min.css"></script>
    <![endif]-->

    <!-- Google Font Link: Choose font you want on google font(http://www.google.com/webfonts) and make sure your replace those fonts in name in custom.css -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Sanchez:400,400italic' rel='stylesheet'
          type='text/css'>

    <!-- ##### Le HTML5 shim, for IE6-8 support of HTML5 elements ##### -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--  ##### fav and touch icons ##### -->
    <!-- <link rel="shortcut icon" href="img/favicon.ico"> -->
    <!-- For third-generation iPad with high-resolution Retina display: -->
    <!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple144.png"> -->
    <!-- For iPhone with high-resolution Retina display: -->
    <!-- <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple114.png"> -->
    <!-- For first- and second-generation iPad: -->
    <!-- <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple72.png"> -->
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <!--<link rel="apple-touch-icon-precomposed" href="img/apple57.png"> -->

    <style>

        .box {
            padding: 2px;
            text-align: center;
        }

        .box .inner {
            background-color: #fff;
            height: 200px;
        }

        .social-blue{
            border: 2px solid #3b5998;
            color: #3b5998;
            background: #fff;
            width: 150px;
            margin: 10px 0px;
        }

        .social-red{
            border: 2px solid #e52d27;
            color: #e52d27;
            background: #fff;
            width: 150px;
            margin: 10px 0px;
        }

        .social-grey{
            border: 2px solid #0d0d0d;
            color: #0d0d0d;
            background: #fff;
            width: 200px;
            margin: 10px 0px;
        }

        #company_logo{
            /* Rounded Corners */
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            display: block;margin: auto;margin-top: 15px;
        }

        .profile-usertitle {
            text-align: center;
            margin-top: 20px;
        }

        .profile-usertitle-name {
            color: #5a7391;
            font-size: 25px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .profile-usertitle-job {

            color: #5b9bd1;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .profile-userbuttons {
            text-align: center;
            margin-top: 10px;
        }

        .profile-userbuttons .btn {
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 600;
            padding: 6px 15px;
            margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
            margin-right: 0px;
        }

        .product_img_wrapper{
            height: 50px;overflow: hidden;padding: 0px;
        }
        .product_img{
            position: absolute;bottom:10px;left: 5px;
            width: 140px;
        }

        .box  a:hover {
            text-decoration: none;
            border: 1px solid yellow;
        }

    </style>
</head>

<body>

<?php $this->view('_template/navigation_menu',"newRecipe"); ?>

<div class="container-fluid mrg50T mrg50B" >
    <?php $details = json_decode($this->getCooperateUserDetails($this->user_name) ,true);    ?>
    <div class="col-lg-3 hgt600"  style="text-align: center;margin-top: 25px;">
        <img id="company_logo" src="/Ambula/uploads/profile/commercial_user/<?=$this->user_name?>/<?=$this->user_name?>.jpg"  height="150"  alt=""/>
        <div class="profile-usertitle">
            <div  class="profile-usertitle-name"><?=$details["company_name"]; ?></div>
        </div>
        <div class="profile-usertitle-job">
            <?php $categories = json_decode($this->getCategoriesByUser($details["idcommercial_user"]) ,true);
              $count = 1;
               foreach ($categories as $category) {
                if($count != 1)   echo ' , ';
                echo '<a href="#">'.$category['title'].'</a>' ;

                   $count++;
               }

            ?>
        </div>
        <div class="profile-userbuttons">
            <button type="button" class="btn btn-success btn-sm">Ask <span class="glyphicon glyphicon-hand-right"></button>
            <button type="button" class="btn btn-danger btn-sm">About <span class="glyphicon glyphicon-home"></button>
        </div>

        <ul class="list-group mrg20T" >
            <li class="list-group-item" >
            <a href="<?=$details["web_url"]; ?>" target="_blank" class="" style="display: block;" >Website <span class="glyphicon glyphicon-globe"></span></a>
            </li>

            <li class="list-group-item" >
            <a href="<?=$details["facebook_url"]; ?> "target="_blank" class="" style="display: block;" >Facebook <i class="fa fa-facebook"></i></span></a>
            </li>

            <li class="list-group-item">
            <a href="<?=$details["youtube_url"]; ?>" target="_blank" class="" style="display: block;" >Youtube <i class="fa fa-youtube"></i></a>
            </li>

        </ul>

    </div>
    <div class="col-lg-9">
        <div class="col-lg-12 mrg10T"   >

            <ul class="nav nav-pills">
                <li role="presentation" class="active"><a data-toggle="tab" href="#promotions">Promotions</a></li>
                <li role="presentation"><a data-toggle="tab" href="#recipes">Recipes</a></li>
            </ul>

            <div class="tab-content" >
                <div id="promotions" class="tab-pane fade in active" style="border: 1px solid #b1b1b1;">
                    <?php $promotions = json_decode($this->getAllPromotionsByUser($this->user_name),true);
                    foreach ($promotions as $promotion) {
                        ?>
                        <div    class="col-lg-4" style="">
                            <div style="background : url('/Ambula/<?=$promotion['image_url'] ?>') no-repeat;background-size :  cover;height: 200px;margin: 50px 5px 0px;overflow: hidden;">

                            </div>
                            <div style="margin:0; ">
                                <a href="" class="btn btn-default col-lg-6 col-md-6 col-sm-6" data-toggle="modal" style="border-radius: 0px;" data-target="#myModal" >Renew</a>
                                <a href="" class="btn btn-danger col-lg-6 col-md-6 col-sm-6" style="border-radius: 0px;">Delete</a>
                            </div>
                        </div>
                    <?php
                      }

                    ?>

                </div>
                <div id="recipes" class="tab-pane fade">

                    <?php $recipes = json_decode($this->getRecipesByUser($this->user_name),true);

                    foreach ($recipes as $recipe) {
                        ?>
                        <div    class="col-lg-4" style="">
                            <div style="background : url('http://localhost/Ambula/uploads/<?=$recipe['idRecipe']; ?>/thumb.jpg') no-repeat;background-size :  cover;height: 200px;margin: 50px 5px 0px;overflow: hidden;">
                                <img src="" width="100%" alt=""/>
                            </div>
                            <div style="margin:0; ">
                                <a href="" class="btn btn-default col-lg-6 col-md-6 col-sm-6" style="border-radius: 0px;">Update</a>
                                <a href="" class="btn btn-danger col-lg-6 col-md-6 col-sm-6" style="border-radius: 0px;">Delete</a>
                            </div>
                        </div>
                    <?php
                    }

                    ?>

                </div>
            </div>


         </div>
    </div>

</div>

<!--  modal to update promotion time  -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false"
     style=" overflow: scroll; height:auto;" data-backdrop="false">
    <div class="container">
        <div class="row">
            <div class="modal-dialog modal-dialog-center col-m-12">
                <div class="modal-content row">
                    <div class="col-lg-12">
                        <div class="modal-header row">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Update promotion </h4>
                        </div>
                        <div class="modal-body row">
                            <div class="col-sm-12">
                                <div class="alert alert-info row">
                                    You must be signed in as an Ambula&trade; coporate user to add new Promotions to
                                    Ambula&trade; promotions.
                                    Sign Up here as a Coporate User
                                </div>
                                <div class="row">
                                    <a href="/Ambula/registration/regNewCommercialUser/"
                                       class="btn btn-primary btn-block" role="button">Join Ambula Promotions</a>
                                    <a href="/Ambula/login" class="btn btn-block" role="button"
                                       style="border: 2px solid">Already a Member, Log In</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer row">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>