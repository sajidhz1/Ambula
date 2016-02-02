<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Search Results for '<?=$_GET['q'] ?>'</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/typeahead.css" rel="stylesheet" media="screen"/>


    <script type="text/javascript" src="/Ambula/public/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/bootstrap.min.js"></script>
    <script src="/Ambula/public/js/typeahead.js"></script>

    <!-- fav icon -->
    <link rel="icon" href="/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">
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
        .search-result-heading{
            padding:0px 0px 0px 10px; line-height:40px; border-bottom:2px solid #000; border-color:rgba(0,0,0,0.3);
            text-align: left;
            color:#dc4238;
        }
        h5{
            text-decoration: underline;
            color: #333;
        }
        .recipe-item:nth-child(3n+2){
            border-right: 1px dotted #a1a1a1;
            border-left: 1px dotted #a1a1a1;
        }
        .recipe-item{
            border-bottom: 1px dotted #a1a1a1;
            height: 240px;
        }

    </style>
</head>

<body style="">

<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>

<div class="container-fluid" style="margin-top: 50px;">
    <div class="col-lg-2" style="height: 400px;">
        <h4>Search</h4>
        <select class="form-control" id="category">
            <option value="0">All</option>
            <option value="1">Recipes</option>
            <option value="2">Groceries</option>
        </select>
        <br>
        <h4>Filters</h4>
        <ul style="list-style-type: none;">
            <li><label><input type="checkbox" value="vegetarian" name="filter"> vegetarian</label></li>
            <li><label><input type="checkbox" value="vegetarian" name="filter"> non vegetarian</label></li>
            <li><label><input type="checkbox" value="vegetarian" name="filter"> vegetarian</label></li>
        </ul>
        <br>
        <h4>Categories</h4>
        <ul style="list-style-type: none;">
        <?php
        $arr=json_decode($this->viewCategories(),true);
        foreach($arr as $category)
        {
        ?>
            <li><a href="" style=""> <?=$category['title'] ?></a> <span style="color: brown;font-weight: 500;">></span></li>
        <?php } ?>

        </ul>
    </div>
    <div class="col-lg-8" style="height: 400px;">
        <h3 class="search-result-heading">Showing results for "<?=$_GET['q'] ?>"</h3>
        <div class="col-lg-12" style="background: #999999;height: 75px;"></div>
        <div id="search-content">

        <?php $recipe_array = json_decode($this->searchResults(),true);

           foreach($recipe_array as $recipe){
        ?>
               <a class="col-lg-4 recipe-item" href="/Ambula/recipes/viewRecipe/<?=$recipe['idRecipe'] ?>" style="display: block;">
                   <div style="height: 150px;overflow: hidden;"><img  class="center-block" src="/Ambula/uploads/<?=$recipe['idRecipe'] ?>/thumb.jpg" style="width: 150px;margin-top: 10px;"> </div>
                   <h4 style="text-align: center;"><?=$recipe['title'] ?></h4>
               </a>
        <?php } ?>
            </div>
    </div>
    <div class="col-lg-2" style="height: 400px;background: #888888;">


    </div>


</div>
</body>
</html>