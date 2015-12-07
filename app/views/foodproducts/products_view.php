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
    <script type="text/javascript" src="http://localhost/Ambula/public/js/typeahead.js"></script>

    <script src="http://localhost/Ambula/public/js/bootstrap.min.js"></script>

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
        .box {
            padding: 5px;
            text-align: center;
        }

        .box .inner {
            background-color: #eee;
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
<!-- Header Carousel -->
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
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>
            <div class="carousel-caption">
                <h2>Caption 1</h2>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
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

    <div class="row" style=" margin: 25px 10px;">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#hom">Latest</a></li>
            <li><a data-toggle="tab" href="#menu1">Brands</a></li>
            <li><a data-toggle="tab" href="#menu2">Find a Product</a></li>
            <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
        </ul>

        <div class="tab-content" style="margin-top: 20px;">
            <div class="tab-pane fade in active"  id="hom">

                <div class="col-lg-2 box" style="height: 265px;margin: auto;">
                    <div class="inner box">
                        <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                        <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                             style="display:block;margin: auto;">
                        <a href="" class="btn btn-default" style="margin-top: 5px;margin-bottom: 5px;">Quick View</a>
                    </div>
                </div>

                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                        <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                             style="display:block;margin: auto;">
                        <a href="" class="btn btn-default" style="margin-top: 5px;margin-bottom: 5px;">Quick View</a>
                    </div>
                </div>

                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                        <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                             style="display:block;margin: auto;">
                        <a href="" class="btn btn-default" style="margin-top: 5px;margin-bottom: 5px;">Quick View</a>
                    </div>
                </div>

                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                        <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                             style="display:block;margin: auto;">
                        <a href="" class="btn btn-default" style="margin-top: 5px;margin-bottom: 5px;">Quick View</a>
                    </div>
                </div>

                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                        <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                             style="display:block;margin: auto;">
                        <a href="" class="btn btn-default" style="margin-top: 5px;margin-bottom: 5px;">Quick View</a>
                    </div>
                </div>

                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                        <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                             style="display:block;margin: auto;">
                        <a href="" class="btn btn-default" style="margin-top: 5px;margin-bottom: 5px;">Quick View</a>
                    </div>
                </div>

                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                        <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                             style="display:block;margin: auto;">
                        <a href="" class="btn btn-default" style="margin-top: 5px;margin-bottom: 5px;">Quick View</a>
                    </div>
                </div>

                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                        <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                             style="display:block;margin: auto;">
                        <a href="" class="btn btn-default" style="margin-top: 5px;margin-bottom: 5px;">Quick View</a>
                    </div>
                </div>

                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                        <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                             style="display:block;margin: auto;">
                        <a href="" class="btn btn-default" style="margin-top: 5px;margin-bottom: 5px;">Quick View</a>
                    </div>
                </div>

                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                        <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                             style="display:block;margin: auto;">
                        <a href="" class="btn btn-default" style="margin-top: 5px;margin-bottom: 5px;">Quick View</a>
                    </div>
                </div>

                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                        <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                             style="display:block;margin: auto;">
                        <a href="" class="btn btn-default" style="margin-top: 5px;margin-bottom: 5px;">Quick View</a>
                    </div>
                </div>

                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        <h5 style="color: #333333">Kist Mango & Melon jam</h5>
                        <img src="http://localhost/Ambula/public/img/no_preview_available.jpg"
                             style="display:block;margin: auto;">
                        <a href="" class="btn btn-default" style="margin-top: 5px;margin-bottom: 5px;">Quick View</a>
                    </div>
                </div>
                <div class="col-lg-2 col-lg-offset-5" style="margin-top: 20px;">
                    <a href="" class="btn btn-lg btn-default" style="display:block;margin: auto;">View All Products</a>
                </div>

            </div>
            <div id="menu1" class="tab-pane fade">
                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        </div>
                    </div>
                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        </div>
                    </div>
                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        </div>
                    </div>
                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        </div>
                    </div>
                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        </div>
                    </div>
                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        </div>
                    </div>
                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        </div>
                    </div>
                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        </div>
                    </div>
                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        </div>
                    </div>
                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        </div>
                    </div>
                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        </div>
                    </div>
                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        </div>
                    </div>
                <div class="col-lg-2 box" style="height: 265px;">
                    <div class="inner box">
                        </div>
                    </div>


            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>

                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam.</p>
            </div>
            <div id="menu3" class="tab-pane fade">
                <h3>Menu 3</h3>

                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                    explicabo.</p>
            </div>
        </div>
    </div>

    <div class="row" style="height: 300px;background: #eee;margin-top: 50px;"></div>
</div>

<script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.11.0.min.js"></script>

<script src="http://localhost/Ambula/public/js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 4000 //changes the speed
    })
</script>

</body>
</html>