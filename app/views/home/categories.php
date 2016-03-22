<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Categories</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="http://localhost/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link type="text/css" rel="stylesheet" href="http://localhost/Ambula/public/css/custom.css"/>
    <link type="text/css" rel="stylesheet" href="http://localhost/Ambula/public/css/color1.css"/>


    <!-- fav icon -->
    <link rel="icon" href="../public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/bootstrap.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
    <link type="text/css" rel="stylesheet" href="http://localhost/Ambula/public/css/style.css"/>


</head>

<body>

<?php $this->view('_template/navigation_menu', "categories") ?>

<div class="container-fluid" style="margin-top: 75px;">
    <h1 class="pg-title txt-yellow"><span>Categories</span></h1>

    <div class="container  col-lg-12" id="category-grid">
        <div class="row ">
            <div class="thumbnail-grid flex">
            <?php
            $arr = json_decode($this->viewCategories(), true);
            foreach ($arr as $category) {
                ?>
                <div class="col-lg-2 col-sm-6"
                     style="background:url(http://localhost/Ambula/uploads/<?php echo $category['thumb_url']; ?>) no-repeat center;">
                    <a href="category/<?php echo $category['title']; ?>/?id=<?php echo $category['idCategory']; ?>"
                       class="flex-item">
                        <span><h3 style="text-shadow: 2px 2px #222;"><?php echo $category['title']; ?></h3></span>
                    </a>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container" style="text-align:center;">
        <p class="text-muted">

        <p>&copy; 2015 The Ambula

        <p></p>
    </div>
</footer>
</body>
</html>

