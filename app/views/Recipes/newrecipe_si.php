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
    <link href="../public/css/recipes-style.css" rel="stylesheet" media="screen"/>
    <link href="../public/css/range-slider.css" rel="stylesheet" media="screen"/>

	  <!-- fav icon -->
    <link rel="icon" href="/public/img/fav_ico.png" type="image/gif" sizes="16x16">



    <script type="text/javascript" src="../public/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../public/js/registration/validator.js"></script>
    <script type="text/javascript" src="../public/js/recipes/bootstrap-slider.js"></script>
    <script src="../public/js/typeahead.js"></script>


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

</head>

<body>
<?php $this->view('_template/navigation_menu', "newRecipe") ?>
<div class="container mrg50T">
    <h4 class="txt-red">අළුත් වට්ටෝරුවක්</h4>

    <form action="/recipes/addRecipeSi" method="post">
    <div class="col-lg-7 hgt500" style="padding-top:15px;background: #e8e8e8;">
        <div class="form-group col-lg-9 col-sm-12">
            <!-- Username -->
            <label class="control-label" for="recipetitle">වට්ටෝරුවේ නම </label>

            <div class="controls">
                <input type="text" id="recipetitle" name="title" placeholder="" class="form-control"
                       required>

                <span class="help-block with-errors" id="recipe-error"></span>
            </div>
            <input type="hidden" name="idrecipe"  value="<?=$_GET['r'] ?>" >
        </div>
        <div class="col-lg-12">
        <h4 style="margin-bottom: 15px;"> ක්‍රමය</h4>

        <div class="input-group" style="width: 100%">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <textarea  id="editor1" name="description"  class="ckeditor col-lg-12 col-sm-12" rows="15" cols="40"></textarea>
            </div>
            <br>
        </div>
        </div>

    </div>
    <div class="col-lg-5 hgt500" style="background-color: #f4f4f4; border: 1px solid #B2B2B2;overflow-y: scroll;">
        <div class="ingredients-control" >
        <h4>අවශ්ය දෑ</h4>
        <div class="entry">
            <div class="input-group" style="width: 100%">
                <div class="col-lg-10 col-xs-11 col-sm-10">
                    <input class="form-control" name="ingname[]"  type="text"
                           placeholder="උදා: තේකොළ මේස හැදි 2ක් "/>
                </div>
                <div class="col-lg-1 col-xs-1 col-sm-2">

                    <button class="btn btn-success btn-add" type="button">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>

                </div>
                <br>
            </div>
        </div>
    </div>
    </div>

        <div class="col-lg-offset-5">
            <button class="btn btn-success btn-lg" style="margin-top: 5px;">යොමු කරන්න </button>
        </div>

    </form>

</div>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.config.height = 500;
    CKEDITOR.replace( 'editor1');



</script>

<script type="text/javascript" src="../public/js/registration/validator.js"></script>
<script type="text/javascript" src="../public/js/recipes/script.js"></script>
<script src="//cdn.ckeditor.com/4.5.3/basic/ckeditor.js"></script>
</body>
</html>