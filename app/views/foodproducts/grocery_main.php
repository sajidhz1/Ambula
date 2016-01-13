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
            background: #fff;
            height:225px;
            display: block;

        }

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

        .subcat-tile {
            padding: 5px;
            border: 1px solid #B2B2B2;
            /* Rounded Corners */
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            margin-right: 6px;
            text-align: center;
        }

        .subcat:hover .subcat-tile{
            border: 1px solid #666;
        }
        .subcat-tile:hover {
            text-decoration: none;

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

<div class="container-fluid" style="background-color: #f2f2f2;">

    <div class="row" style="margin: 25px 10px;">
        <div class="col-lg-9">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#hom">Latest</a></li>
            <li><a data-toggle="tab" href="#menu2">Find a Product</a></li>
        </ul>

        <div class="tab-content" style="margin-top: 20px;">
            <div class="tab-pane fade in active"  id="hom">
            <?php
                $arr = json_decode($this->viewProducts(16), true);
                foreach($arr as $product){
            ?>
                <div class="col-lg-3 box" style="margin: auto;">
                    <a class="inner box subcat-tile" href="/Ambula/FoodProducts/product?productId=<?=$product['idproducts']?>">
                        <h5 style="color: #333333;height: 50px;"><?=$product['product_name'] ?></h5>
                        <div style="height: 130px;overflow: hidden;">
                        <img class="product_thumb" src="/Ambula/<?=$product['img_url'] ?>"
                             style="display:block;margin: auto;width: 100%;">
                         </div>
                    </a>
                </div>
                <?php } ?>

            </div>


            <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>

                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam.</p>
            </div>

        </div>
       </div>
        <div class="col-lg-3">
            <h3 class="pg-title txt-red"><span>Categories</span></h3>
            <ul class="list-group" style="margin: 20px;">
                <?php
                //this method call is no-longer needed
                //$arrsub = json_decode($this->loadCategories(), true);
                $arrPoductNum = json_decode($this->getProductCountofCategories(), true);
                foreach ($arrPoductNum as $category) {
                    ?>
                    <li class="list-group-item">
                        <a href="/Ambula/Foodproducts?cat=<?php echo $category['title']; ?>"  style="font-size: 0.9em;font-weight: 500;color: brown;" ><?php echo $category['title']; ?>
                        </a>
					 <span style="margin-left: 5px;" class="badge">
						 <?php
                         if(is_null($category['product_count'])){
                             echo 0;
                         }else{
                             echo $category['product_count'];
                         }
                         ?>
					 </span>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>


    <div class="row" style="background: #fff;margin-top: 50px;">
        <h2 class="pg-title txt-red"><span>Partners</span></h2>
        <?php $partners = json_decode($this->getAllCooperateProfiles(), true);

        foreach($partners as $partner){ ?>
        <a href="/Ambula/home/profile/<?=$partner['user_name'] ?>">
        <div class="col-lg-2" style="margin-bottom: 20px;">
            <img src="/Ambula/uploads/profile/commercial_user/<?=$partner['user_name'] ?>/<?=$partner['user_name'] ?>.jpg" style="display:block;margin: auto;" class="product-brand" height="120" width="120"  />
            <h4 style="text-align: center"><?=$partner['company_name'] ?></h4>
        </div>
        </a>
        <?php } ?>
    </div>
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