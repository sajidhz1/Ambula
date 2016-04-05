<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
          content="Recipes,Sri Lankan,Savoury,Sinhala,Maalu Paan,Pol Sambola,Kiri hodhi,Desserts,Thambili,Ceylon,Food ,Sri lanka cooking ,Srilankan Culinary">
    <meta name="description"
          content="The Ambula is a Sri Lankan Culinary Platform that aims to serve as center and a hub for all Sri Lankan Culinary enthusiasts in Sri Lanka and all around the globe to share and gain knowledge related to that and also a platform for various producers to reach their desired audience">


    <link href="public/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <link href="public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="public/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="public/css/slider.css">

    <!-- fav icon -->
    <link rel="icon" href="public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="public/js/jquery-1.11.0.min.js"></script>
    <link type="text/css" rel="stylesheet" href="public/css/style.css"/>

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


</head>

<body>
<!--Header START -->
<?php $this->view('_template/navigation_menu', "home") ?>

<!-- Header END -->

<section id="home" class="container-fluid pages"> <!-- Home START -->
<div class="container">
<div class="row pos-relative hgt1000">
<!-- We need fix height for this because we have image in absolute position. -->

<!--
    tab-w350 = table width:350px
    btm0 = bottom:0px | right0 = top:0px;


-->
<div class="jumbotron" id="jumbo">

<div class="row">
    <div id="rt-showcase" class="slider-container rt-overlay-dark col-md-9">
        <!-- Slider Start -->
        <div class="rt-container slider-container">
            <div class="rt-grid-8 rt-alpha rt-omega">


                <!--[if IE]>
                <link rel="stylesheet" href="./sliders/demo-02/engine1/ie.css"><![endif]-->
                <!--[if lte IE 9]>
                <script type="text/javascript" src="./sliders/demo-02/engine1/ie.js"></script>
                <![endif]-->
                <div class='csslider1 autoplay'>
                    <input name="cs_anchor1" autocomplete="off" id="cs_slide1_0" type="radio"
                           class="cs_anchor slide">
                    <input name="cs_anchor1" autocomplete="off" id="cs_slide1_1" type="radio"
                           class="cs_anchor slide">
                    <input name="cs_anchor1" autocomplete="off" id="cs_slide1_2" type="radio"
                           class="cs_anchor slide">
                    <input name="cs_anchor1" autocomplete="off" id="cs_slide1_3" type="radio"
                           class="cs_anchor slide">
                    <input name="cs_anchor1" autocomplete="off" id="cs_play1" type="radio"
                           class="cs_anchor" checked>
                    <input name="cs_anchor1" autocomplete="off" id="cs_pause1" type="radio"
                           class="cs_anchor">
                    <ul>
                        <div style="width: 100%; visibility: hidden; font-size: 0px; line-height: 0;">
                            <img src="public/img/slider/buns.jpg" style="width: 100%;">
                        </div>
                        <li class="num0 img">
                            <img src="public/img/slider/sr1.jpg" alt="Buns" title="Buns"/>
                        </li>
                        <li class="num1 img">
                            <img src="public/img/slider/cc.jpg" alt="Croissant" title="Croissant"/>
                        </li>
                        <li class="num2 img">
                            <img src="public/img/slider/lemonpie.jpg" alt="Lemon pie" title="Lemon pie"/>
                        </li>
                        <li class="num3 img">
                            <img src="public/img/slider/teaandcake.jpg" alt="Breakfast" title="Breakfast"/>
                        </li>

                    </ul>
                    <div class="cs_description">
                        <label class="num0">
                            <span class="cs_title"><span class="cs_wrapper">Fried rice</span></span>
                            <br/><span class="cs_descr"><a href="#">With devilled Prawns</a></span>
                        </label>
                        <label class="num1">
                            <span class="cs_title"><span class="cs_wrapper">Croissant</span></span>
                            <br/><span class="cs_descr"><span
                                    class="cs_wrapper">Chocolate croissant</span></span>
                        </label>
                        <label class="num2">
                            <span class="cs_title"><span class="cs_wrapper">Red rice</span></span>
                            <br/><span class="cs_descr"><span
                                    class="cs_wrapper">Gotu kola sambol ,papadam and Ambulthiyal</span></span>
                        </label>
                        <label class="num3">
                            <span class="cs_title"><span class="cs_wrapper">Tea Time</span></span>
                            <br/><span class="cs_descr"><span
                                    class="cs_wrapper">Lemon tea and Cheese cake</span></span>
                        </label>
                    </div>

                    <div class="cs_arrowprev">
                        <label class="num0" for="cs_slide1_0"></label>
                        <label class="num1" for="cs_slide1_1"></label>
                        <label class="num2" for="cs_slide1_2"></label>
                        <label class="num3" for="cs_slide1_3"></label>
                    </div>
                    <div class="cs_arrownext">
                        <label class="num0" for="cs_slide1_0"></label>
                        <label class="num1" for="cs_slide1_1"></label>
                        <label class="num2" for="cs_slide1_2"></label>
                        <label class="num3" for="cs_slide1_3"></label>
                    </div>

                    <div class="cs_bullets">
                        <label class="num0" for="cs_slide1_0">
                            <span class="cs_point"></span>
                                            <span class="cs_thumb"><img src="public/img/slider/tooltips/buns.jpg"
                                                                        alt="Buns"
                                                                        title="Buns"/></span>
                        </label>
                        <label class="num1" for="cs_slide1_1">
                            <span class="cs_point"></span>
                                            <span class="cs_thumb"><img src="public/img/slider/tooltips/croissant.jpg"
                                                                        alt="Croissant" title="Croissant"/></span>
                        </label>
                        <label class="num2" for="cs_slide1_2">
                            <span class="cs_point"></span>
                                            <span class="cs_thumb"><img src="public/img/slider/tooltips/lemonpie.jpg"
                                                                        alt="Lemon pie" title="Lemon pie"/></span>
                        </label>
                        <label class="num3" for="cs_slide1_3">
                            <span class="cs_point"></span>
                                            <span class="cs_thumb"><img src="public/img/slider/tooltips/teaandcake.jpg"
                                                                        alt="Breakfast" title="Breakfast"/></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- Slider End -->
    </div>
    <!-- Sign up Box -->
    <div class="col-md-3" id="signup-box">
        <h3>Add Your Recipe</h3>

        <p>your legacy ,your recipe , share it spread it </p>
        <?php if (isset($_SESSION["user_logged_in"])) { ?>
            <a href="/recipes/newRecipe" style="color: #fff;" id="btn-signup" class="btn btn-primary">Add Recipe</a>
        <?php } else { ?>
            <a href="/registration" style="color: #fff;" id="btn-signup" class="btn btn-primary">SIGN UP</a>
        <?php } ?>
    </div>

</div>
<!-- Cusines -->
<div class="row">
    <div class="col-md-9" id="col-cuisines">
        <h3>Looking a Recipe For..?</h3>

        <ul class="rig columns-6">

            <?php
            $arr = json_decode($this->viewCategories(5), true);
            foreach ($arr as $category) {
                ?>
                <li>
                    <img height="150" src="uploads/<?php echo $category['thumb_url']; ?>"/>
                    <h4><a href="home/category/<?= $category['title']; ?>/?id=<?= $category['idCategory']; ?>"
                           style="color: #222"><?php echo $category['title']; ?></a></h4>

                    <p>
                        <?php $arrsub = json_decode($this->getSubCategoriesByID($category['idCategory'], 5), true);

                        foreach ($arrsub as $subcategory) {
                            ?>
                            <a href="home/category/<?= $category['title']; ?>/?id=<?= $category['idCategory']; ?>"
                               style="color: #ff0000"><?php echo $subcategory['title']; ?></a>
                        <?php } ?>
                    </p>
                </li>
            <?php
            }
            ?>

        </ul>
    </div>

    <div class="col-md-3" id="col-vid">
        <video width="250" height="240" controls>
            <source src="mov_bbb.mp4" type="video/mp4">
            <source src="mov_bbb.ogg" type="video/ogg">
        </video>
    </div>
</div>

<!-- Ingredients Row -->

<div class="row">
    <div class="col-md-12 " id="col-recent">
        <h3>Recently Added Recipes</h3>
        <?php  $ar = json_decode($this->viewRecent(), true);

        $i = 1;
        ?>
        <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="5000"
             id="myCarousel">
            <div class="carousel-inner">
                <?php
                foreach ($ar as $recipe) {
                    ?>
                    <div class="item <?php if ($i == 1) echo "active" ?>">
                        <div class="col-md-2 col-sm-6 col-xs-12"><a
                                href="http://localhost/Ambula/recipes/viewRecipe/<?= $recipe['idRecipe']; ?>">
                                <div style="height: 100px;overflow: hidden;">
                                    <img
                                        src="<?= UPLOADS_RECIPE ?>/<?= $recipe['idRecipe']; ?>/thumb.jpg"
                                        class="img-responsive" style=""></div>
                                <span style="text-align: center;"><h5><?php echo $recipe['title']; ?> </h5></span>


                            </a>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
                ?>
            </div>
            <a class="left carousel-control" href="" data-slide="prev"><i
                    class="glyphicon glyphicon-chevron-left"></i></a>
            <a class="right carousel-control" href="" data-slide="next"><i
                    class="glyphicon glyphicon-chevron-right"></i></a>
        </div>
    </div>
</div>

<!-- End of Ingredients Row -->

</div>
</div>
</section>
<!-- Home END -->


<!-- top recepies END -->
<div id="footer">
    <div class="container">
        <div class="col-lg-4">
            <img src="public/img/fav_ico.png" height="150" style="margin-left:25px;margin-top:35px;">
        </div>
        <div class="col-lg-4">
            <h3>Categories</h3>
            <ul id="footer-category">
                <?php

                $arr = json_decode($this->viewCategories(), true);
                foreach ($arr as $category) {
                    ?>
                    <li><a href=""><?= $category['title']; ?></a></li>


                <?php
                }?>
            </ul>


        </div>
        <div class="col-lg-4">
            <h3>Contact:</h3>

            <p>Have a question or feedback? Contact us!</p>

            <p><a href="" title="Contact me!"><i class="fa fa-envelope"></i> Contact</a></p>

            <h3>Follow Us On:</h3>
            <a href="https://www.facebook.com/the.ambula" id="gh" target="_blank" title="Facebook"><span
                    class="fa-stack fa-lg">
              <i class="fa fa-square-o fa-stack-2x"></i>
              <i class="fa fa-user fa-stack-1x"></i>
            </span>Facebook</a>
            <a href="" " target="_blank" title="Instagram"><span class="fa-stack fa-lg">
              <i class="fa fa-square-o fa-stack-2x"></i>
              <i class="fa fa-instagram fa-stack-1x"></i>
            </span>Instagram</a>
        </div>
        <br/>

        <hr>

        <p style="text-align:center;">Copyright © The Ambula | <a href="">Privacy Policy</a> | <a href="">Terms of
                Use</a></p>


    </div>
</div>


<script type="text/javascript">

    $(function () {

        $('#myCarousel').carousel();
        //Ingredients Carousel
        $('.carousel[data-type="multi"] .item').each(function () {
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i = 0; i < 4; i++) {
                next = next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }

                next.children(':first-child').clone().appendTo($(this));
            }
        });

        $('.carousel-control.left').click(function () {
            $('#myCarousel').carousel('prev');
            return false;
        });

        $('.carousel-control.right').click(function () {
            $('#myCarousel').carousel('next');
            return false;
        });
    });
</script>
<!-- Java Scripts Codes-->

<script src="public/js/bootstrap.min.js"></script>

<script src="public/js/typeahead.js"></script>

<script src="public/js/jquery.scrollTo-1.4.3.1-min.js"></script>
<script src="public/js/jquery.quicksand.js"></script>
<script src="public/js/jquery.easing.js"></script>
<script src="public/js/jquery.easing.compatibility.js"></script>
<script>document.createElement('section');
    var duration = 700, easing = 'easeInOutExpo';</script>
<script src="public/js/script.js"></script>

<!-- Google Analytics -->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-65028180-1', 'auto');
    ga('send', 'pageview');

</script>
<!-- End Google Analytics -->

</body>

</html>