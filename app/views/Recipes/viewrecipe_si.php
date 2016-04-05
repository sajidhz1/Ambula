<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link rel="stylesheet" href="/Ambula/public/css/blueimp-gallery.min.css">
    <link href="/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/recipes-style.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/bootstrap-image-gallery.css" rel="stylesheet" media="screen"/>


    <!-- fav icon -->
    <link rel="icon" href="/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">

    <script type="text/javascript" src="/Ambula/public/js/jquery-1.11.0.min.js"></script>

    <script src="/Ambula/public/js/bootstrap.min.js"></script>
    <script src="/Ambula/public/js/recipes/jquery.blueimp-gallery.min.js"></script>
    <script src="/Ambula/public/js/bootstrap-image-gallery.min.js"></script>


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
        p {
            font-size: 18px;
            color: #262626;
        }
    </style>
</head>

<body>
<?php $this->view('_template/navigation_menu', "newRecipe") ?>
<div class="mrg50T" style="margin-top: 100px;">
    <?php $array = json_decode($this->getRecipe_si(), true); ?>

    <div class="col-lg-4" style="padding-top: 25px;">

        <div>
            <?php
            $arr = json_decode($this->getRecipeImages($_GET['r']), true);
            foreach ($arr as $img) {
                if (file_exists($img['image_url'])) {
                    ?>

                    <a href="/<?= $img['image_url']; ?>" title="<?php echo $array[0]['title'] ?>" data-gallery=""
                       style="margin-left: 12px;"><img
                            src="/<?= $img['image_url']; ?>" height="100" width="100"/></a>

                <?php
                } else {
                }
            } ?>
        </div>

        <div>
            <br>
            <h4>අවශ්‍ය දෑ</h4>
            <ol style="color: #343434;font-size: 1.1em;"> <?php
                $exp = array();
                $exp = explode("<br>", $array[0]['ingredients']);

                foreach ($exp as $i)
                    if ($i != null)
                        echo '<li style="margin-top:5px;color : #626262">' . $i . '</li>';
                ?>
            </ol>
        </div>

    </div>
    <div class="col-lg-7">
        <h2 class="txt-red"><?= $array[0]['title'] ?></h2>
        <br><br>
        <?= $array[0]['description'] ?>
    </div>


</div>

<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>