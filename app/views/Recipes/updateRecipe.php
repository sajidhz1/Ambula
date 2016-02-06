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

    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen"/>


    <!-- fav icon -->
    <link rel="icon" href="/public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="../public/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../public/js/registration/validator.js"></script>
    <script src="../public/js/typeahead.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script type="text/javascript" src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>


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

    #overlay {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        background: #000;
        opacity: 0.8;
        filter: alpha(opacity=80);
    }

    #loading {
        z-index: 150;
        width: 70px;
        height: 70px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -28px 0 0 -25px;

    }


</style>
<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>

<div class="container-fluid">

<fieldset style="padding-top: 45px;">
<div id="legend">
    <legend class="new-recipe">Update Recipe  <a href="/recipes/newrecipe?lang=si&r=<?=$_GET['id'] ?>" class="btn btn-info">සිංහලෙන්</a></legend>
    
</div>

<div class="row">
    <div id="recipePart1" class="col-lg-5 col-sm-12">

        <?php $result = $this->getRecipe($_GET['id']); ?>
        <input type="hidden" value="<?= $_GET['id'] ?>" id="recipeID"/>

        <div class="form-group col-lg-8 col-sm-12">
            <!-- Username -->
            <label class="control-label" for="recipetitle">Recipe Title</label>

            <div class="controls">

                <input type="text" id="recipetitle" name="recipetitle" value="<?= $result[0]['title'] ?>"
                       class="form-control"
                       required>
                <span class="help-block with-errors" id="recipe-error"></span>
            </div>
            <a class="btn btn-success" id="updateTitle">save</a>
        </div>

        <div class="form-group col-lg-9 col-sm-12">
            <!-- Password-->
            <br>
            <label class="control-label" for="category">Choose Category</label>

            <div class="controls">
                <select class="form-control" name="category" id="category">
                    <option value="0">select category</option>
                    <?php
                    $arr = json_decode($this->getCategoriesArray(), true);
                    foreach ($arr as $category) {
                        ?>
                        <option value="<?= $category['idCategory']; ?>"><?= $category['title']; ?></option>
                    <?php } ?>
                </select>
                <span class="help-block with-errors" id="category-error"></span>
            </div>
            <a class="btn btn-success" id="updateCategory">save</a>
        </div>

        <div class="form-group col-lg-9 col-sm-12">
            <!-- Password -->
            <br>
            <label class="control-label" for="subcategory">Choose Sub Category</label>

            <div class="controls">

                <select class="form-control" name="subcategory" id="subcategory">
                    <option value="0">select sub category</option>

                </select>
            </div>
        </div>

    </div>
    <div class="col-lg-7 col-sm-12" id="fields">
        <div class="ingredients-control" style="height: 450px;overflow-y:scroll; ">
            <label class="control-label" for="field1"><h3>Ingredients</h3></label>
            <br>
            <span id="ing_error" style="color: red;"></span>
            <br>

            <div class="col-xs-5 col-sm-5" style="color: brown"> Ingredient Name</div>
            <div class="col-xs-2 col-sm-2" style="color: brown"> Qty</div>
            <br>


            <?php $arrsub = json_decode($this->getRecipeIngredients($_GET['id']), true);

            foreach ($arrsub as $ingredient) {
                ?>

                <div class="entry">

                    <div class="input-group">
                        <div class="col-xs-5 col-sm-5">
                            <input class="form-control" name="ingname[]" type="hidden"
                                   value="<?php echo $ingredient['id_recipe_has_ingredients'] ?>"/>
                            <input class="form-control" name="ingname[]" type="text"
                                   value="<?php echo $ingredient['title']; ?>" placeholder="Example : sugar , salt"/>
                        </div>
                        <div class="col-xs-2 col-sm-2">
                            <input class="form-control" name="amount[]" value="<?php echo $ingredient['qty'] ?>"
                                   placeholder="0" type="text"/>
                        </div>
                        <div class="dropdown col-xs-3 col-sm-3">
                            <select class="form-control" name="metrics">
                            	<option value="<?php echo $ingredient['units'] ?>"><?php echo $ingredient['units'] ?></option>
                                <option value="kg">kg</option>
                                <option value="g">g</option>
                                <option value="oz">oz</option>
                                <option value="spn">spn</option>
                                <option value="tspn">tspn</option>
                            </select>
                        </div>
                        <div class="col-xs-1 col-sm-2">

                            <button class="btn btn-danger btn-remove" type="button">
                                <span class="glyphicon glyphicon-minus"></span>
                            </button>

                        </div>

                        <br>
                    </div>

                </div>
            <?php } ?>

            <div class="entry">
                <div class="input-group">
                    <div class="col-xs-5 col-sm-5">
                        <input class="form-control" name="ingname1[]" type="text"
                               placeholder="Example : sugar , salt"/>
                    </div>
                    <div class="col-xs-2 col-sm-2">
                        <input class="form-control" name="amount1[]" placeholder="0" type="number"/>
                    </div>
                    <div class="dropdown col-xs-3 col-sm-3">
                        <select class="form-control" name="metrics1[]">
                            <option value="kg">kg</option>
                            <option value="g">g</option>
                            <option value="oz">oz</option>
                            <option value="spn">spn</option>
                            <option value="tspn">tspn</option>
                            <option value="cup">Cup</option>
                            <option value="ml">ml</option>
                            <option value="l">l</option>
                            <option value="packet">packet</option>
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
        </div>
        <a style="margin: 10px" id="updateIngredients" class="btn btn-success"> Save Ingredients </a>
    </div>

</div>
<div class="row">
    <div class="col-lg-3 col-sm-12" id="recipePart2" style="margin-top: 20px;">

        <div id="fields">



            <div class="input-group">
                <span><h5>Preparation time</h5></span>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' id="prep_time" value="<?=$result[0]['prep_time'] ?>" name="prep_time" class="form-control" onchange="alert('lala')" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
                <h5><span id="time"><?php $time = explode(":", $result[0]['prep_time']); ?><?php if (intval($time[0]) != 0) echo $time[0] . " Hours "; ?>  <?php if (intval($time[1]) != 0) echo $time[1] . "  minutes"; ?></span></h5>

            </div>

            <div class="input-group">
                <span><h5>Cooking time</h5></span>
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' id="cook_time" value="<?=$result[0]['cook_time'] ?>" name="cook_time" class="form-control" onchange="alert('lala')" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
                <h5><span id="time"><?php $time = explode(":", $result[0]['cook_time']); ?><?php if (intval($time[0]) != 0) echo $time[0] . " Hours "; ?>  <?php if (intval($time[1]) != 0) echo $time[1] . "  minutes"; ?></span></h5>

            </div>


            <div>
                <span><h2>Tags</h2></span>
                <span>separate tags by a "," </span>
                <textarea name="tags" id="tags" rows="3" style="border: 1px solid #e1e1e1; width :100%;padding: 5px;margin-top: 5px;"><?=$result[0]['tags'] ?></textarea>
                <a style="margin: 10px" id="updateTags" class="btn btn-success"> Save Tags </a>
            </div>
        </div>


    </div>
    <div class="directions-control col-lg-9 col-sm-12" style="margin-top: 20px;border: none;border : 1px solid #e1e1e1;height: 600px; overflow-y: scroll;"
         id="fields">
        <label class="control-label" for="field1"><h3>Directions</h3></label>


        <?php $arrdesc = json_decode($this->getRecipeDescription($_GET['id']), true);
        $i = 0;
        foreach ($arrdesc as $description) {
            ++$i;
            ?>
            <div class="entry2">

                <input type="hidden" value="<?= $description['idDescription'] ?>"/>

                <div class="col-lg-8 col-sm-5">
                    <span>Step <?= $i ?>.</span>
                    <textarea class="form-control" name="steps[]" rows="2"
                              id="comment"><?= $description['description_en'] ?></textarea>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <br>
                    <?php if (file_exists('/' . $description['image_url'])) ?>
                    <img src="/<?= $description['image_url']; ?>" width="75" height="75">
                </div>
                <div class="col-lg-2 col-sm-1">
                    <br><br>
                    <button class="btn btn-danger btn-remove1" type="button">
                        <span class="glyphicon glyphicon-minus"></span>
                    </button>

                            <span class="file-input btn btn-primary btn-file glyphicon glyphicon-camera">
                              <input name="stepsimg[]" type="file" class="btn btn-default" multiple>
                            </span>


                </div>
            </div>
        <?php } ?>
        <form method="POST" enctype="multipart/form-data"
              id="form1">
            <div class="new-directions">
                <div class="entry2">

                    <div class="col-lg-8 col-sm-5">
                        <span>Step <?= $i ?>.</span>
                        <textarea class="form-control" name="steps[]" rows="2" id="comment"></textarea>
                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <br>

                        <img src="/public/img/no_preview_available.jpg" class="output" width="75" height="75">
                    </div>
                    <div class="col-lg-2 col-sm-1">
                        <br><br>
                        <button class="btn btn-success btn-add" type="button">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>

                            <span class="file-input btn btn-primary btn-file glyphicon glyphicon-camera">
                              <input name="stepsimg[]"
                                     onchange="$('.output')[$('.output').length-1].src = window.URL.createObjectURL(this.files[0]);"
                                     type="file" class="btn btn-default" multiple>
                            </span>


                    </div>
                </div>
            </div>
            <button style="margin: 10px;margin-right: 500px;" id="updateDescription" class="btn btn-success"> Save
                Directions
            </button>
        </form>
    </div>

</div>


<div class="row">
    <div class="form-group col-lg-8 col-sm-12">
        <div class="col-lg-offset-7">
            <!-- Button -->
            <br>

            <div class="controls">
                <a id="continuebtn"><h5>Finish Continue to the recipe >></h5></a>
            </div>

        </div>
    </div>
</div>
</div>


<script type="text/javascript" src="../public/js/recipes/updateScript.js"></script>


</body>
</html>