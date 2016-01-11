<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="http://localhost/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>

    <!-- fav icon -->
    <link rel="icon" href="http://localhost/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">

    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/typeahead.js"></script>



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

        .product-brand{
            float: none;
            margin: 0 auto;

            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important;
        }

        .box {
            padding: 5px;
            text-align: center;


        }

        .box .inner {
            border: 1px solid #B2B2B2;
            background-color: #eee;
            height: 225px;
            display: block;

        }

        .ad{
            padding: 5px;
            text-align: center;}



        .product_thumb{
            position: relative;

        }
        header.carousel {
            height: 50%;
        }

        header.carousel .item,
        header.carousel .item.active,
        header.carousel .carousel-inner {
            height: 100%;
        }

        header.carousel .fill {
            width: 100%;
            height: 100%;
            background-position: center;
            background-size: cover;
        }



    </style>

</head>

<body>

<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>
<header id="myCarousel" class="carousel slide" style="margin-top:50px;height: 250px;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image:url('http://www.responsivejqueryslider.com/images/classicFullWidth/01_classic.jpg');"></div>
            <div class="carousel-caption">
                <h2>Caption 1</h2>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('http://www.responsivejqueryslider.com/images/coolFullWidth/04_cool.jpg');"></div>
            <div class="carousel-caption">
                <h2>Caption 2</h2>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
            <div class="carousel-caption">
                <h2>Caption 3</h2>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>
<div class="container-fluid">
    <h3 class="pg-title txt-red"><span><?php echo $_GET['cat'];?></span></h3>
    <div class="dropdown" style="position:absolute;right: 0;margin-right:80px;top: 320px;">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Select Category
            <span class="caret"></span>
        </button>
    <ul class="dropdown-menu">
        <?php $arrsub = json_decode($this->loadCategories(), true);

        foreach ($arrsub as $category) {
            ?>
            <li class=""><a href="#"  style="font-size: 0.9em;" ><?php echo $category['title']; ?> </a></li>
        <?php } ?>
    </ul>
        </div>

    <div class="row">
        <div class="col-lg-10 hgt500" >
            <div class="col-lg-2 box">
                <div class="inner">
                    <img src="/Ambula/public/img/no_preview_available.jpg" style="width: 100%;height:175px; ">
                    <p style="height: 50px;overflow: hidden;text-align: center;padding:2px;color: #222">Chocolate chip Cookies nestle product</p>
                </div>
            </div>
            <div class="col-lg-2 box">
                <div class="inner">
                    <img src="/Ambula/public/img/no_preview_available.jpg" style="width: 100%;height:175px; ">
                    <p style="height: 50px;overflow: hidden;text-align: center;padding:2px;color: #222">Chocolate chip Cookies</p>
                </div>
            </div>
            <div class="col-lg-2 box">
                <div class="inner">
                    <img src="/Ambula/public/img/no_preview_available.jpg" style="width: 100%;height:175px; ">
                    <p style="height: 50px;overflow: hidden;text-align: center;padding:2px;color: #222">Chocolate chip Cookies</p>
                </div>
            </div>
            <div class="col-lg-2 box">
                <div class="inner">
                    <img src="/Ambula/public/img/no_preview_available.jpg" style="width: 100%;height:175px; ">
                    <p style="height: 50px;overflow: hidden;text-align: center;padding:2px;color: #222">Chocolate chip Cookies</p>
                </div>
            </div>
            <div class="col-lg-2 box">
                <div class="inner">
                    <img src="/Ambula/public/img/no_preview_available.jpg" style="width: 100%;height:175px; ">
                    <p style="height: 50px;overflow: hidden;text-align: center;padding:2px;color: #222">Chocolate chip Cookies</p>
                </div>
            </div>
            <div class="col-lg-2 box">
                <div class="inner">
                    <img src="/Ambula/public/img/no_preview_available.jpg" style="width: 100%;height:175px; ">
                    <p style="height: 50px;overflow: hidden;text-align: center;padding:2px;color: #222">Chocolate chip Cookies</p>
                </div>
            </div>
            <div class="col-lg-2 box">
                <div class="inner">
                    <img src="/Ambula/public/img/no_preview_available.jpg" style="width: 100%;height:175px; ">
                    <p style="height: 50px;overflow: hidden;text-align: center;padding:2px;color: #222">Chocolate chip Cookies</p>
                </div>
            </div>
            <div class="col-lg-2 box">
                <div class="inner">
                    <img src="/Ambula/public/img/no_preview_available.jpg" style="width: 100%;height:175px; ">
                    <p style="height: 50px;overflow: hidden;text-align: center;padding:2px;color: #222">Chocolate chip Cookies</p>
                </div>
            </div>
            <div class="col-lg-2 box">
                <div class="inner">
                    <img src="/Ambula/public/img/no_preview_available.jpg" style="width: 100%;height:175px; ">
                    <p style="height: 50px;overflow: hidden;text-align: center;padding:2px;color: #222">Chocolate chip Cookies</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 ad hgt500" >
            <div class="" style="background: #999;height: 300px;"></div>
            <div class="" style="background: #999;height: 300px;margin-top: 10px;"></div>
        </div>

    </div>
</div>

</body>
</html>