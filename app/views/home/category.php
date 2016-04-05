<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:image" content="http://theambula.lk/uploads/categories/curries.jpg"/>
    <meta property="og:url" content="http://theambula.lk/recipes/viewRecipe"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Curries"/>


    <link href="http://localhost/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/typeahead.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/w3.css" type="text/css" rel="stylesheet"/>

    <!-- fav icon -->
    <link rel="icon" href="http://localhost/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">

    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/bootstrap.min.js"></script>
    <script src="http://localhost/Ambula/public/js/typeahead.js"></script>

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
        .search-result-heading {
            padding: 0px 0px 0px 10px;
            line-height: 40px;
            border-bottom: 2px solid #000;
            border-color: rgba(0, 0, 0, 0.3);
            text-align: left;
            color: #dc4238;
        }

        h5 {
            text-decoration: underline;
            color: #333;
        }

        .recipe-item:nth-child(3n+2) {
            border-right: 1px dotted #a1a1a1;
            border-left: 1px dotted #a1a1a1;
        }

        .recipe-item {
            border-bottom: 1px dotted #a1a1a1;
        }

        #recipe_img {
            width: 100%;

        }

        .subcat-tile {
            padding: 5px;
            border: 1px solid #B2B2B2;
            /* Rounded Corners */
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            height: 220px;
            margin-right: 6px;
            margin-bottom: 15px;
            text-align: center;
        }

        .subcat:hover .subcat-tile {
            border: 1px solid #666;
        }

        .subcat:hover {
            text-decoration: none;

        }
    </style>
</head>

<body style="margin-left: 5%;
    margin-right: 5%;">
<?php $this->view('_template/navigation_menu', "newRecipe") ?>
<div class="container-fluid" style="margin-top: 75px;">
    <h2 class="txt-orange mrg20B"><?= $this->category; ?></h2>
    <label class="col-lg-offset-7" for="subcat">Choose Subcategory :</label>
    <select id="subcat">
        <?php
        $arr = json_decode($this->getSubCategoryArray(), true);
        foreach ($arr as $subcategory) {
            ?>
            <option><?php echo $subcategory['title']; ?></option>
        <?php } ?>
    </select>
    </br>
    </br>
    <div class="col-lg-10 col-md-10 col-sm-12">

        <?php

        $arr = json_decode($this->getRecipesByCategory($_GET['id']), true);

        foreach ($arr as $recipe) {

            ?>
            <div class="w3-col l3 m4 s12">
                <div class="w3-card-2 w3-col l11 m11 s12" style="margin:15px 15px;">

                    <a href="http://localhost/Ambula/recipes/viewRecipe/<?= $recipe['idRecipe']; ?>">

                        <img src="http://localhost/Ambula/uploads/recipes/<?= $recipe['idRecipe']; ?>/thumb.jpg"
                             height="175"   alt="Avatar" class="w3-col l12 m12 s12"/>

                        <div class="w3-container w3-col m12 l12 s12" style="height: 150px;">
                            <h4><b><?= $recipe['title']; ?></b></h4>

                            <p>Views : <?= $recipe['views'] ?> <i class="glyphicon glyphicon-eye-open"></i></p>

                            <p>Rating: <?= $recipe['rating'] ?> <i class="glyphicon glyphicon-star"></i></p>
                        </div>

                    </a>
                </div>
            </div>

        <?php } ?>

    </div>
    <div class="col-lg-2 col-md-2 col-sm-0" style="border: 1px solid #888;height:400px;" id="ad-space">

    </div>


</div>

</body>
</html>