<?php
/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 8/18/2015
 * Time: 3:11 AM
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/style.css" rel="stylesheet" media="screen"/>

    <!-- fav icon -->
    <link rel="icon" href="http://localhost/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">

    <script type="text/javascript" src="../public/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>

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


    <style>
        .navbar-promo {
            background: rgba(237, 146, 8, 0.5); /* for IE */
            border-radius: 5px;
            border: 1px solid #E0D6CC;
            margin-right: 7.55%;
            margin-left: 7.55%;
            margin-top: 51px;
            padding: 0px;
            color: #337ab7;
            font-size: 20px;
        }

        label.valid {
            width: 24px;
            height: 24px;
            background: url(<?php echo URL; ?>../public/img/valid.png) center center no-repeat;
            display: inline-block;
            text-indent: -9999px;
        }

        label.error {
            font-weight: bold;
            color: red;
            padding: 2px 8px;
            margin-top: 2px;
        }

        #promotionContainer {
            margin: 20px;
        }

        .modal {
            background: rgba(000, 000, 000, 0.7);
            min-height: 1000000px;
        }

        .modal-dialog-center {
            margin-top: 15%;
        }

        .modal-header {
            background: #e78f08;
            color: white;
        }

        .btn {
            border-radius: 0px;
        }

        .card div {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .icon-bar {
            background: #337AB7;
        }

        .myCollapseBar li {
            border-right: 2px solid #0480be;
        }

        .thumbnail-grid div {
            position: inherit;
            width: 300px;
            height: 300px;
            border-radius: 3px;
            margin: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            transition: all .5s ease-in-out;
        }

        .thumbnail-grid div:hover {
            /*box-shadow: inset 0 -300px 0 0 rgba(0, 0, 0, 0.5);*/
            box-shadow: none;
            transition: all .5s ease-in-out;
        }

        p.promoName {
            height: 50px;
            background: linear-gradient(rgba(0, 0, 0, 1), rgba(7, 100, 180, 0.3));
            text-align: center;
            padding-top: 20px;
            padding-left: 5px;
            padding-right: 5px;
            overflow: hidden;
            text-overflow: ellipsis;
            text-transform: uppercase;
            font-size: large;
            color: #ffffff;
        }

        p.promoCompany {
            height: 50px;
            padding-top: 20px;
            padding-left: 5px;
            padding-right: 5px;
            background: linear-gradient(rgba(7, 100, 180, 0.3), rgba(0, 0, 0, 1));
            font-size: large;
            color: #ffffff;
        }

        #promoViewModal {
            margin: 0px;
            max-height: 100%;
        }

        #modalDialog {
            margin-top: 0px;
            width: 100%;
            height: 100%;
            padding: 0px;
            z-index: 1040;
        }

        #modalContent{
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 0;
        }

        #singlePromoModalImg {
            background-size: contain;
            overflow-x: hidden;
            overflow-y: hidden;
        }

        #singlePromoModalDesc{

        }

        #singlePromoModalImg{
            max-height: 100%;
            max-width: 100%;
        }

    </style>

    <script type="text/javascript">
        var onResize = function () {
            // apply dynamic padding at the top of the body according to the fixed navbar height
            $("#promonav").css("margin-top", $(".navbar-fixed-top").height());
        };

        // attach the function to the window resize event
        $(window).resize(onResize);

        //to view all 'restaurent' type promotions onload of the view (all document ready functions go here)
        $(document).ready(function (e) {
            var type = "restaurant";
            $.ajax({
                type: "POST",
                url: "/Ambula/Promotion/viewPromotionsTest",
                dataType: "html",
                data: {promotoionType: type},
                success: function (response) {
                    var text = response;

                    $("#promotionContainer").html(text);
                }
            });
            onResize();
        });

        //ajax method for displaying all the promotions in the type selected
        $(document).on('click', '.promoType', function (e) {
            var type = $(this).attr('id');
            $.ajax({
                type: "POST",
                url: "/Ambula/Promotion/viewPromotionsTest",
                dataType: "html",
                data: {promotoionType: type},
                success: function (response) {
                    var text = response;

                    $("#promotionContainer").html(text);
                }
            });
        });

        //ajx method to view a single promotion enlarged
        $(document).on('click', '.singlePromo', function (e) {
            var id = $(this).attr('id');
            $.ajax({
                type: "POST",
                url: "/Ambula/Promotion/viewSinglePromotion",
                data: {promotoionId: id},
                success: function (response) {
                    var myVar = JSON.parse(response);
                    var pId, pUId, pType, pName, pImg, pDescription, pStartDate, pEndDate, pDateAdded;
                    pId = myVar[0].idPromotion;
                    pUId = myVar[0].users_user_id;
                    pType = myVar[0].promotion_type;
                    pName = myVar[0].promotion_name;
                    pImg = myVar[0].image_url;
                    pDescription = myVar[0].description;
                    pStartDate = myVar[0].start_date;
                    pEndDate = myVar[0].end_date;
                    pDateAdded = myVar[0].date_time_added;
                    $('#promoViewModal').modal({show: true, backdrop: true, keyboard: true});  // put your modal id
                    $("#singlePromoModalImg > img").attr("src", "/Ambula/" + pImg);
                    $("#singlePromoModalDesc > p").show().html(myVar[0].promotion_type + "  " + myVar[0].promotion_name);
                }
            });
        });
    </script>
</head>

<!--Header START -->
<body>
<?php $this->view('_template/navigation_menu', "viewPromotion") ?>

<!-- Tesing promo nav bar-->
<nav class="navbar navbar-promo" id="promonav">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar" style="background: #337AB7;"></span>
                <span class="icon-bar" style="background: #337AB7;"></span>
                <span class="icon-bar" style="background: #337AB7;"></span>
            </button>
            <?php if (isset($_SESSION["user_logged_in"]) && $_SESSION["user_account_type"] == 2) { ?>
                <a class="navbar-brand myCollapseBar" href="/Ambula/Promotion/index"
                   style="float: left; overflow-x: hidden; border-right: 2px solid #0480be;">Add New Promotions</a>
            <?php } else { ?>
                <a class="navbar-brand myCollapseBar" href="#"
                   style="float: left; overflow-x: hidden; border-right: 2px solid #0480be;" data-toggle="modal"
                   data-target="#myModal">Join Ambula Promotions</a>
            <?php } ?>
        </div>
        <div class="collapse navbar-collapse myCollapseBar" id="myNavbar">
            <ul class="nav navbar-nav" style="color: #c12e2a;">
                <li class="active"><a id="restaurant" class="promoType" href="#">Restaurents</a></li>
                <li><a id="foodproduct" class="promoType" href="#">All You can eat</a></li>
                <li><a id="culinary_equipment" class="promoType" href="#">Best Cook wear deals</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-------------------- Modal --------------------->

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
                            <h4 class="modal-title" id="myModalLabel">Signup As a Coporate User</h4>
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

<!-- div tag for containing promotions -->

<div class="row" style="">
    <div id="promotionContainer" class="col-lg-12 thumbnail-grid" style="margin: 0px; padding: 0 8% 0 8%;">

    </div>
</div>

<!-- single promotion displaying modal-->

<div class='modal fade row' id='promoViewModal' role='dialog'>
    <div class="modal-dialog col-lg-12" id="modalDialog">
        <div class="modal-content row" id="modalContent">
            <div class="col-md-9" id="singlePromoModalImg" style="padding: 0px">
                <img src="" id="singPromoImage">
            </div>
            <div class="col-md-3" id="singlePromoModalDesc" style="">
                <p>

                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

