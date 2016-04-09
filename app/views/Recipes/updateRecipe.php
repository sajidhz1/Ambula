<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/bootstrap-tagsinput.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/recipes-style.css" rel="stylesheet" media="screen"/>

    <link
        href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css"
        rel="stylesheet" media="screen"/>

    <!-- fav icon -->
    <link rel="icon" href="../public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="/Ambula/public/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/recipes/bootstrap-tagsinput.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script type="text/javascript"
            src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
    <script src="/Ambula/public/js/typeahead.js"></script>


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
<style>

    label.valid {
        width: 24px;
        height: 24px;
        background: url(<?php echo URL; ?>Public/img/valid.png) center center no-repeat;
        display: inline-block;
        text-indent: -9999px;
    }

    label.error {
        font-weight: bold;
        color: red;
        padding: 2px 8px;
        margin-top: 2px;
    }

    .modal {
        background: rgba(000, 000, 000, 0.7);
        min-height: 1000000px;
    }

    .modal-dialog-center {
        margin-top: 10%;
    }

    .selected-image {
        padding: 3px;
        background-color: red;
    }

    .form-control, .btn {
        border-radius: 0px;
    }


</style>

<script type="text/javascript">
    var onResize = function () {
        // apply dynamic padding at the top of the body according to the fixed navbar height
        $("#newRecipeContainer").css("margin-top", $(".navbar-fixed-top").height());
    };

    // attach the function to the window resize event
    $(window).resize(onResize);
    $(document).ready(onResize);
</script>
<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>

<div class="container-fluid">

<fieldset style="padding-top: 20px;" id="newRecipeContainer">
<div id="legend">
    <legend class="new-recipe">Edit Recipe</legend>
</div>
<form data-toggle="validator" role="form" method="POST" enctype="multipart/form-data" action="addNewRecipe"
      id="form1">
<div class="row">
    <div id="recipePart1"  class="col-lg-5 col-sm-12">
        <?php     $recipe = $this->getRecipe($_GET['id']);   ?>
        <div class="form-group col-lg-9 col-sm-12">
            <!-- Username -->
            <label class="control-label" for="recipetitle">Recipe Title</label>

            <div class="controls">
                <input type="text" value="<?=$recipe[0]['title']; ?>" id="recipetitle" name="recipetitle" placeholder="" class="form-control"
                       required>

                <span class="help-block with-errors" id="recipe-error"></span>
            </div>
        </div>
<!--        <div class="form-group col-lg-9 col-sm-12">-->
<!--            <!-- E-mail -->
<!--            <label class="control-label" for="email">Recipe Photo</label>-->
<!---->
<!--            <div class="input-group">-->
<!--                    <span class="input-group-btn">-->
<!--                        <span class="btn btn-primary btn-file">-->
<!--                            Browse&hellip; <input name="recipephoto1" type="file" multiple>-->
<!--                        </span>-->
<!--                    </span>-->
<!--                <input type="text" id="recipephoto1" class="form-control" readonly required>-->
<!--            </div>-->
<!--            <span class="help-block with-errors">this will be used as the thumbnail for the recipe</span>-->
<!---->
<!--        </div>-->
        <div class=" col-lg-11 col-sm-12" style="margin: 15px 0px;" >
            <div class="dropzone" style="height: 250px; overflow-y: auto;" id="mydropzone"></div>
        </div>
        <?php $result =  json_decode($this->loadImagesFromRecipesFolder($recipe[0]['idRecipe']),true);

             $result;
         ?>
<!--        <div class="form-group col-lg-9 col-sm-12">-->
<!--            <!-- Password-->
<!--            <br>-->
<!--            <label class="control-label" for="category">Choose Category</label>-->
<!---->
<!--            <div class="controls">-->
<!--                <select class="form-control" name="category" id="category">-->
<!--                    <option value="0">select category</option>-->
<!--                    --><?php
//                    $arr = json_decode($this->getCategoriesArray(), true);
//                    foreach ($arr as $category) {
//                        ?>
<!--                        <option value="--><?//= $category['idCategory']; ?><!--">--><?//= $category['title']; ?><!--</option>-->
<!--                    --><?php //} ?>
<!--                </select>-->
<!--                <span class="help-block with-errors" id="category-error"></span>-->
<!--            </div>-->
<!--        </div>-->

        <div class="form-group col-lg-9 col-sm-12">
            <label class="control-label" for="tags">Tags</label>

            <div class="controls">

                <input type="text" name="tags" id="tags" value="<?=$recipe[0]['tags'] ?>" data-role="tagsinput"/>
            </div>
        </div>

    </div>
    <div class="ingredients-control col-lg-7 col-sm-12" id="fields">
        <label class="control-label" for="field1"><h3>Ingredients</h3></label>
        <br>
        <span id="ing_error" style="color: red;"></span>
        <br>

        <div class="col-xs-5 col-sm-5" style="color: brown"> Name</div>
        <div class="col-xs-2 col-sm-2" style="color: brown"> Qty</div>
        <br>
        <?php $ingredients =  json_decode($this->getRecipeIngredients($recipe[0]['idRecipe']) ,true);

           foreach($ingredients as $ingredient){
        ?>
        <div class="entry">
            <div class="input-group">
                <div class="col-xs-5 col-sm-5">
                    <input class="form-control" id="recipetitle" value="<?=$ingredient['title'] ?>" name="ingname[]" type="text"
                           placeholder="Example : sugar , salt"/>
                </div>
                <div class="col-xs-2 col-sm-2">
                    <input class="form-control" name="amount[]" value="<?=$ingredient['qty'] ?>" placeholder="0" type="text"/>
                </div>
                <div class="dropdown col-xs-3 col-sm-3">
                    <select class="form-control" name="metrics[]">
                        <option value=""  >select</option>
                        <option value="kg" <?php if($ingredient['units'] === 'kg'){ echo 'selected="selected"'; } ?> >kg</option>
                        <option value="g" <?php if($ingredient['units'] === 'g'){ echo 'selected="selected"'; } ?> >g</option>
                        <option value="oz" <?php if($ingredient['units'] === 'oz'){ echo 'selected="selected"'; } ?> >oz</option>
                        <option value="tbspn" <?php if($ingredient['units'] === 'tbspn'){ echo 'selected="selected"'; } ?> >tbspn</option>
                        <option value="tspn" <?php if($ingredient['units'] === 'tspn'){ echo 'selected="selected"'; } ?> >tspn</option>
                        <option value="cup" <?php if($ingredient['units'] === 'cup'){ echo 'selected="selected"'; } ?> >Cup</option>
                        <option value="ml" <?php if($ingredient['units'] === 'ml'){ echo 'selected="selected"'; } ?> >ml</option>
                        <option value="l" <?php if($ingredient['units'] === 'l'){ echo 'selected="selected"'; } ?> >l</option>
                        <option value="packet" <?php if($ingredient['units'] === 'packet'){ echo 'selected="selected"'; } ?> >packet</option>
                        <option value="drops" <?php if($ingredient['units'] === 'drops'){ echo 'selected="selected"'; } ?> >drops</option>
                        <option value="pieces" <?php if($ingredient['units'] === 'pieces'){ echo 'selected="selected"'; } ?> >pieces</option>
                        <option value="pinch">pinch</option>
                        <option value="tin">tin</option>

                    </select>
                </div>
                <div class="col-xs-1 col-sm-2">

                    <button class="btn btn-success btn-add" type="button">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>

                </div>
                <br>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-12" id="recipePart2" style="">
        <table class="table table-bordered table-hover" id="tab_logic">
            <thead>
            <tr>
                <th class="text-center">
                    title
                </th>
                <th class="text-center">
                    Amount
                </th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <div id="fields">
            <label class="control-label" for="field1"><h2>Estimated time</h2></label>

            <div class="input-group">
                <span><h5>Preparation time</h5></span>

                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' id="prep_time" name="prep_time" class="form-control"
                           onchange="alert('lala')"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
                <h5><span id="time-data">0 Hours and 0 Minutes</span></h5>

            </div>
            <div class="input-group">
                <span><h5>Cooking time</h5></span>

                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' id="cook_time" name="cook_time" class="form-control"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
                <h5><span id="time-data-2">0 Hours and 0 Minutes</span></h5>
            </div>

        </div>
    </div>


    <script type="text/javascript">
        $(function () {
            var dateNow = new Date();
            $('#datetimepicker1').datetimepicker(
                {
                    format: 'HH:mm',
                    defaultDate: moment(dateNow).hours(0).minutes(0).seconds(0).milliseconds(0)
                }
            );

            $('#datetimepicker2').datetimepicker(
                {
                    format: 'HH:mm',
                    defaultDate: moment(dateNow).hours(0).minutes(0).seconds(0).milliseconds(0)
                }
            );

            $("#myModal2").on("shown.bs.modal", function () {

                var html;
                $('#myModal2').find('.modal-body').html('<p>Please wait till the images for this step gets uploaded</p>');
                $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
                    type: 'POST',
                    url: '/Ambula/recipes/showImages',
                    success: function (responseText) {
                        $('#myModal2').find('.modal-body').html('');


                        // Get the result and asign to each cases
                        var data = $.parseJSON(responseText);
                        $.each(data, function (i, item) {

                            $('#myModal2').find('.modal-body').append('<img src="/Ambula/uploads/recipes/temp/<?=Session::get('username')?>/' + item + '" class="select-image" height="120" width="120" style="margin-left:10px;" border="0" />');



                            <script type="text/javascript">
                            $(function () {
                                var dateNow = new Date();
                                $('#datetimepicker1').datetimepicker(
                                    {
                                        format: 'HH:mm',
                                        defaultDate: moment(dateNow).hours(0).minutes(0).seconds(0).milliseconds(0)
                                    }
                                );

                                $('#datetimepicker2').datetimepicker(
                                    {
                                        format: 'HH:mm',
                                        defaultDate: moment(dateNow).hours(0).minutes(0).seconds(0).milliseconds(0)
                                    }
                                );

                                $("#myModal2").on("shown.bs.modal", function () {
                                    var html;
                                    $('#myModal2').find('.modal-body').html('<p>Please wait till the images for this step gets uploaded</p>');
                                    $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
                                        type: 'POST',
                                        url: '/Ambula/recipes/showImages',
                                        success: function (responseText) {
                                            $('#myModal2').find('.modal-body').html('');

                                            // Get the result and asign to each cases
                                            var data = $.parseJSON(responseText);
                                            $.each(data, function (i, item) {

                                                $('#myModal2').find('.modal-body').append('<img src="/Ambula/uploads/recipes/temp/<?=Session::get('username')?>/' + item + '" class="select-image" height="120" width="120" style="margin-left:10px;" border="0" />');


                                            });

                                        }
                                    });

                                });

                            }
                        });
                    });
            });
    </script>


    <div class="directions-control col-lg-9 col-sm-12" style="" id="fields">
        <label class="control-label" for="field1"><h3>Directions</h3></label>

        <?php $recipeDescription = json_decode($this->getRecipeDescription($recipe[0]['idRecipe']),true);

        foreach($recipeDescription as $description){
        ?>
        <div class="entry2">

            <div class="col-lg-8 col-sm-5">
                Step<span class="num">1</span>.
                <textarea class="form-control" name="steps[]" rows="3" id="comment"><?=$description['description_en'] ?></textarea>
            </div>
            <div class="col-lg-2 col-sm-2">
                <br>
                <img src="/Ambula/public/img/no_preview_available.jpg" class="output" width="75"
                     height="75">
                <input name="des_img[]" class="des_img" type="hidden"/>
            </div>
            <div class="col-lg-2 col-sm-1">
                <br><br>

                <button class="choose-image btn btn-primary" data-toggle="modal" data-target="#myModal2"
                        type="button">
                    <span class=" glyphicon glyphicon-camera"></span>
                </button>


                <button class="btn btn-success btn-add" type="button">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>

            </div>
        </div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="controls col-lg-12 col-sm-12">
        <button style="margin-top: 10px;font-size: 1.5em" class="btn btn-success submit col-lg-offset-5">
            Finish
        </button>
        <div class="col-lg-offset-5">
            <!-- Button -->
            <div class="controls">
                <a id="continuebtn" class="btn btn-lg btn-success continue">Continue <span
                        class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
            <div class="controls" style="margin-top: 2px;margin-left: 5px;">
                <a id="backbtn" class="btn btn-danger back"><span
                        class="glyphicon glyphicon-chevron-left"></span> Back</a>
            </div>

        </div>
    </div>
</div>
</form>
</fieldset>

</div>
<div id="loading">
    <h4>Uploading Recipe</h4>
    <h6>will take a moment</h6>
    <img src="/public/img/loading.gif">
</div>

<!-- modal window to upload extra images -->



<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false"
     style=" overflow: scroll; height:auto;" data-backdrop="false">
    <div class="modal-dialog modal-dialog-center">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Choose image for this step</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="/Ambula/public/js/registration/validator.js"></script>
<script type="text/javascript" src="/Ambula/public/js/recipes/script.js"></script>


</body>
</html>