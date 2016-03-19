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
    <title>The Ambula | Promotions</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="http://theambula.lk/public/img/food_tile.jpg"/>
    <meta property="og:url" content="http://theambula.lk/recipes/viewRecipe/"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content=""/>

    <link href="/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/style.css" rel="stylesheet" media="screen"/>
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

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

        .hovereffect {
            width: 300px;
            height: 300px;
            float: left;
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: default;
            margin-bottom: 10px;
            border: 1px solid #e3e3e3;
        }

        .hovereffect .overlay {
            width: 100%;
            height: 100%;
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0;
            opacity: 0;
            background-color: rgba(0, 0, 0, 0.5);
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out
        }

        .hovereffect img {
            display: block;
            min-height: 300px;
            -webkit-transition: all .4s linear;
            transition: all .4s linear;
        }

        .hovereffect h2 {
            text-transform: uppercase;
            color: #fff;
            text-align: center;
            position: relative;
            font-size: 17px;
            background: rgba(0, 0, 0, 0.6);
            -webkit-transform: translatey(-100px);
            -ms-transform: translatey(-100px);
            transform: translatey(-100px);
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            padding: 10px;
        }

        .hovereffect a.info {
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            color: #fff;
            border: 1px solid #fff;
            background-color: transparent;
            opacity: 0;
            filter: alpha(opacity=0);
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            margin: 50px 0 0;
            padding: 7px 14px;
        }

        .hovereffect a.info:hover {
            box-shadow: 0 0 5px #fff;
        }

        .hovereffect:hover img {
            -ms-transform: scale(1.2);
            -webkit-transform: scale(1.2);
            transform: scale(1.2);
        }

        .hovereffect:hover .overlay {
            opacity: 1;
            filter: alpha(opacity=100);
        }

        .hovereffect:hover h2, .hovereffect:hover a.info {
            opacity: 1;
            filter: alpha(opacity=100);
            -ms-transform: translatey(0);
            -webkit-transform: translatey(0);
            transform: translatey(0);
        }

        .hovereffect:hover a.info {
            -webkit-transition-delay: .2s;
            transition-delay: .2s;
        }

        .navbar-promo {
            background: #ff960e; /* for IE */
            border-radius: 5px;
            border: 1px solid #E0D6CC;
            margin-right: 7.55%;
            margin-left: 7.55%;
            margin-top: 51px;
            padding: 0px;
            color: #fff;
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
            padding-left: 4%;
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
            border-right: 2px solid #fff;
        }

        .myCollapseBar a {
            color: #fff;
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

        #promoViewModal {
            margin: 0px;
            max-height: 100%;
            z-index: 100;
        }

        #modalDialog {
            margin-top: 0px;
            width: 100%;
            height: 100%;
            padding: 0px;
            z-index: 1040;
        }

        #modalContent {
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 0;
        }

        #singlePromoModalDesc {

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
                    $('#promoViewModal').modal({show: true, keyboard: true});  // put your modal id
                    $("#singlePromoModalImg > img").attr("src", "/Ambula/" + pImg);
                    $("#modal-title").html(myVar[0].promotion_name);
                    $("#modal-description").html(pDescription);
                    $("#from").html(pStartDate);
                    $("#till").html(pEndDate);
                    $('meta[name=og\\:image]').attr('content', pImg);
                    $('meta[name=og\\:title]').attr('content', pName);

                    if($('#singlePromoModalImg > img').width() > 600 )
                    $('#modalBody').width($('#singlePromoModalImg > img').width() + 450);
                    else
                        $('#modalBody').width($('#singlePromoModalImg > img').width() + 400);
                }
            });
        });

        // facebook share
        function share_facebook(url, name) {
            u = url;
            t = document.title;
            d = name;
            window.open('http://www.facebook.com/sharer.php?u=' + encodeURIComponent(u) + 't=' + encodeURIComponent(t) + '&d=' + encodeURIComponent(d), 'sharer', 'toolbar=0,status=0,width=626,height=436');
            return false;
        }
    </script>
</head>

<!--Header START -->
<body>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=753864634705819";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<?php $this->view('_template/navigation_menu', "viewPromotion") ?>

<!-- Tesing promo nav bar-->
<nav class="navbar navbar-promo " id="promonav">
    <div class="container-fluid">
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar" style="background: #337AB7;"></span>
                <span class="icon-bar" style="background: #337AB7;"></span>
                <span class="icon-bar" style="background: #337AB7;"></span>
            </button>
            <?php if (isset($_SESSION["user_logged_in"]) && $_SESSION["user_account_type"] == 2) { ?>
                <a class="navbar-brand myCollapseBar" href="/Ambula/Promotion/index"
                   style="float: left; overflow-x: hidden; border-right: 2px solid #fff;color: #fff;">Add New
                    Promotions</a>
            <?php } else { ?>
                <a class="navbar-brand myCollapseBar" href="#"
                   style="float: left; overflow-x: hidden; border-right: 2px solid #fff;color: #fff" data-toggle="modal"
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

<!-- single promotion displaying modal-->
<div class="modal fade" id="promoViewModal" tabindex="-1" style="margin-top: -150px;overflow: scroll;" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="false" data-backdrop="false">
    <div class="modal-dialog modal-dialog-center" id="modalBody" style="height:500px;">
        <div class="modal-content col-lg-12 col-md-12 col-xs-12 col-sm-12" style="">

            <div class="modal-header">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
            </div>
            <div class="modal-body" style="height: 550px;">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">

                    <div id="singlePromoModalImg" class="col-lg-8 col-md-8 col-xs-12 col-sm-12"><img src="" style="max-height: 500px;max-width: 120%;" alt=""/></div>
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                        <h3 id="modal-title" class="pg-title" style="text-align: center;color: red">Title here</h3>

                        <p id="modal-description"></p>

                        <span style="font-size: 1.1em;font-weight:800;">Valid From : <span id="from" class="txt-red"></span></span><br><br>
                        <span style="font-size: 1.1em;font-weight:800;">Valid Till : <span id="till" class="txt-red"></span></span>
                        <br>
                        <br>

                        <a class="btn btn-primary"  href="https://www.facebook.com/sharer/sharer.php?u=theambula.lk/recipes/viewRecipe/31?id=12" onclick="return share_facebook('theambula.lk/recipes/viewRecipe/31?id=12','sajidh')" target="_blank">
                            <i class="fa fa-facebook"></i> Share on Facebook
                        </a>

                        <a class="btn btn-info" href="https://twitter.com/intent/tweet?url=http%3A%2F%2Ftheambula.lk%2Frecipes%2FviewRecipe%2F31%3Fid%3D3&text=TEXT&via=theambula" target="_blank"><i class="fa fa-twitter"></i> Tweet</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<!-- div tag for containing promotions -->

<div class="row" style="width: 100%;">
    <div id="promotionContainer" class="col-lg-12" style="margin: 0px; ">

    </div>
</div>

</body>
</html>

