<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../../../public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="../../../public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="../../../public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="../../../public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="../../../public/css/typeahead.css" rel="stylesheet" media="screen"/>


    <script type="text/javascript" src="../../../public/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="../../../public/js/bootstrap.min.js"></script>
    <script src="../../../public/js/typeahead.js"></script>

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

        .subcat-tile {
            padding: 5px;
            border: 1px solid #B2B2B2;
            /* Rounded Corners */
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            width: 18%;
            margin-right: 15px;
            margin-bottom: 15px;
            text-align: center;
        }

    </style>
</head>

<body style="margin-left: 5%;
    margin-right: 5%;">

<!--Header START -->
<nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Needed this button code to show menu in mobile and table -->
        <div class="navbar-header">
            <button data-target="#navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Logo Here -->
            <a class="navbar-brand" href="/Ambula/home"><img src="../../../public/img/ambula-logo.png"
                                                             alt="The Ambula"/></a>
        </div>

        <!-- Top Navigation Here -->
        <div id="navbar-collapse" class="navbar-collapse  collapse">
            <ul id="navbar_documenter" class="nav navbar-nav">
                <li><a class="current" href="/Ambula/home">Home</a></li>
                <li><a href="/Ambula/home/categories">Categories</a></li>
                <li><a href="#topRest">offers</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['username'])) {
                    echo '<li><img src="https://graph.facebook.com/' . Session::get('fbid') . '/picture" width="35" height="35"> <a  class="pull-right" id="modal_user" style="" href="login/logout">' . Session::get('name') . '</a></li>';
                } else {
                    echo '<li> <a  class="pull-right" id="modal_trigger"  style="" href="#modal">Sign In</a></li>';

                }

                ?>

            </ul>

        </div>

    </div>

</nav>

<div class="container-fluid" style="margin-top: 75px;">

    <h2 class="txt-orange mrg20B">Breakfast</h2>

    <div class="col-lg-10 col-sm-12">

        <?php

        $arr = json_decode($this->getRecipesByCategory($_GET['id']), true);
        foreach ($arr as $subcategory) {

            ?>

            <div class="col-lg-3 col-sm-6 subcat-tile">
                <a href="/Ambula/recipes/viewRecipe/<?= $subcategory['idRecipe']; ?>">
           <span>
               <h4><?php echo $subcategory['title']; ?></h4>
           </span>
                    <img src="../../../public/img/s1.jpg" height="120">
                    <br>
                    <span class="txt-red">(20) Recipes</span>
                </a>
            </div>


        <?php } ?>

    </div>
    <div class="col-lg-2" style="border: 1px solid #888">
        bcdvbjk
    </div>


</div>
</body>
</html>