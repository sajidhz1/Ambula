<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="../public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="../public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="../public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="=../public/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../public/css/slider.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- fav icon -->
    <link rel="icon" href="../public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="../public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="../public/js/jquery.leanModal.min.js"></script>

    <script type="text/javascript" src="../public/js/typeahead.js"></script>

    <link type="text/css" rel="stylesheet" href="../public/css/style.css"/>

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

    </style>
</head>

<body>

<?php $this->view('_template/navigation_menu',"newRecipe") ?>
  <div class="container-fluid mrg50T mrg50B" >
      <?php $details = json_decode($this->getCooperateUserDetails() ,true);

      ?>
  <div class="col-lg-3 hgt600"  style="text-align: center;margin-top: 25px;border:1px solid brown">
      <img id="company_logo" src="/Ambula/public/img/no_preview_available.jpg"  height="150" width="150" alt=""/>
      <div class="profile-usertitle">
      <div  class="profile-usertitle-name"><?=$details["company_name"]; ?></div>
      </div>
      <div class="profile-usertitle-job">
          canned food/meat , Flour , Ice Cream ,Grain Products
      </div>
      <div class="profile-userbuttons">
          <button type="button" class="btn btn-success btn-sm">Ask <span class="glyphicon glyphicon-hand-right"></button>
          <button type="button" class="btn btn-danger btn-sm">About <span class="glyphicon glyphicon-home"></button>
      </div>
      <a href="" class="btn btn-default btn-lg social-grey" >Website <span class="glyphicon glyphicon-globe"></span></a>
      <a href="" class="btn btn-default btn-lg social-blue" >Facebook <i class="fa fa-facebook"></i></span></a>
      <a href="" class="btn btn-default btn-lg social-red" >Youtube <i class="fa fa-youtube"></i></a>
  </div>
  <div class="col-lg-9">
        <div class="col-lg-12" style="background:#e2e1d1;height: 315px;margin-top: 25px;"  >
            <h4>Products</h4>
            <a href="" class="btn btn-small btn-success " style="position: absolute;top:5px;right:25px; " >Add Product <span class="glyphicon glyphicon-plus"></span></a>
            <div class="col-lg-2 hgt200 box" >
                <div class="inner box">
                    <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                    <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                         style="display:block;margin: auto;">
                </div>
            </div>

            <div class="col-lg-2 hgt200 box" >
                <div class="inner box">
                    <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                    <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                         style="display:block;margin: auto;">
                </div>
            </div>

            <div class="col-lg-2 hgt200 box" >
                <div class="inner box">
                    <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                    <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                         style="display:block;margin: auto;">
                </div>
            </div>

            <div class="col-lg-2 hgt200 box" >
                <div class="inner box">
                    <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                    <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                         style="display:block;margin: auto;">
                </div>
            </div>

            <div class="col-lg-2 hgt200 box" >
                <div class="inner box">
                    <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                    <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                         style="display:block;margin: auto;">
                </div>
            </div>

            <div class="col-lg-2 hgt200 box" >
                <div class="inner box">
                    <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                    <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                         style="display:block;margin: auto;">
                </div>
            </div>
            <a href="" style="position:absolute;bottom: 0;right: 25px;font-size: 1.1em;color: brown;">View all <span class="glyphicon glyphicon-chevron-right"></span></a>

        </div>
        <div class="col-lg-12" style="background:#e2e1d1;height: 315px;margin-top: 25px;"  >
            <h4>Recipes</h4>
            <a href="" class="btn btn-small btn-success " style="position: absolute;top:5px;right:25px; " >Add Recipe <span class="glyphicon glyphicon-plus"></span></a>
            <div class="col-lg-2 hgt200 box" >
                <div class="inner box">
                    <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                    <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                         style="display:block;margin: auto;">
                </div>
            </div>

            <div class="col-lg-2 hgt200 box" >
                <div class="inner box">
                    <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                    <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                         style="display:block;margin: auto;">
                </div>
            </div>

            <div class="col-lg-2 hgt200 box" >
                <div class="inner box">
                    <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                    <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                         style="display:block;margin: auto;">
                </div>
            </div>

            <div class="col-lg-2 hgt200 box" >
                <div class="inner box">
                    <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                    <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                         style="display:block;margin: auto;">
                </div>
            </div>

            <div class="col-lg-2 hgt200 box" >
                <div class="inner box">
                    <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                    <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                         style="display:block;margin: auto;">
                </div>
            </div>

            <div class="col-lg-2 hgt200 box" >
                <div class="inner box">
                    <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                    <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                         style="display:block;margin: auto;">
                </div>
            </div>
            <a href="" style="position:absolute;bottom: 0;right: 25px;font-size: 1.1em;color: brown;">View all <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
  </div>

  </div>

</body>

</html>