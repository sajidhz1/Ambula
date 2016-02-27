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
    <link rel="icon" href="../public/img/fav_ico.png" type="image/gif" sizes="16x16">

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

</style>
<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>

<div class="container-fluid">

<fieldset style="padding-top: 45px;">
    <div id="legend">
        <legend class="new-recipe">New Recipe</legend>
    </div>
    <form data-toggle="validator"  role="form" method="POST" enctype="multipart/form-data" action="addNewRecipe"
          id="form1">
        <div class="row">
            <div id="recipePart1" class="col-lg-5 col-sm-12">

                <div class="form-group col-lg-9 col-sm-12">
                    <!-- Username -->
                    <label class="control-label" for="recipetitle">Recipe Title</label>

                    <div class="controls">
                        <input type="text" id="recipetitle" name="recipetitle" placeholder="" class="form-control"
                               required>

                        <span class="help-block with-errors" id="recipe-error"></span>
                    </div>
                </div>
                <div class="form-group col-lg-9 col-sm-12">
                    <!-- E-mail -->
                    <label class="control-label" for="email">Photos (min 3)</label>

                    <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file">
                            Browse&hellip; <input name="recipephoto1" type="file" multiple>
                        </span>
                    </span>
                        <input type="text" id="recipephoto1" class="form-control" readonly required>
                    </div>
                    <span class="help-block with-errors">this will be used as the thumbnail for the recipe</span>
                    <br>

                    <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file">
                            Browse&hellip; <input name="recipephoto2" type="file" multiple>
                        </span>
                    </span>
                        <input type="text" class="form-control" id="recipephoto2" readonly required>
                    </div>
                    <br>

                    <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file">
                            Browse&hellip; <input name="recipephoto3" name="recipephoto3" id="recipephoto2" type="file"
                                                  multiple>
                        </span>
                    </span>
                        <input type="text" class="form-control" readonly required>
                    </div>
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
            <div class="ingredients-control col-lg-7 col-sm-12" id="fields">
                <label class="control-label" for="field1"><h3>Ingredients</h3></label>
                <br>
                <span id="ing_error" style="color: red;"></span>
                <br>

                <div class="col-xs-5 col-sm-5" style="color: brown"> Name</div>
                <div class="col-xs-2 col-sm-2" style="color: brown"> Qty</div>
                <br>

                <div class="entry">
                    <div class="input-group">
                        <div class="col-xs-5 col-sm-5">
                            <input class="form-control" name="ingname[]" type="text"
                                   placeholder="Example : sugar , salt"/>
                        </div>
                        <div class="col-xs-2 col-sm-2">
                            <input class="form-control" name="amount[]" placeholder="0" type="text"/>
                        </div>
                        <div class="dropdown col-xs-3 col-sm-3">
                            <select class="form-control" name="metrics[]">
                            	<option value="">select</option>
                                <option value="kg">kg</option>
                                <option value="g">g</option>
                                <option value="oz">oz</option>
                                <option value="tbspn">tbspn</option>
                                <option value="tspn">tspn</option>
                                <option value="cup">Cup</option>
                                <option value="ml">ml</option>
                                <option value="l">l</option>
                                <option value="packet">packet</option>
                                <option value="drops">drops</option>
                                <option value="pieces">pieces</option>
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

            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-12" id="recipePart2" style="display:none;">
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
                        <span><h4>Hours</h4></span>
                        <input style="width: 100%;" id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0"
                               data-slider-max="6" data-slider-step="1"/>
                    </div>
                    <div class="input-group">
                        <span><h4>Minutes</h4></span>
                        <input style="width: 100%;" id="ex2" data-slider-id='ex2Slider' type="text" data-slider-min="0"
                               data-slider-max="60" data-slider-step="5"/>
                    </div>
                    <div class="input-group">
                        <input type="hidden" id="time" name="time">
                        <h4><span id="time-data">Time  00 : 00</span></h4>
                    </div>
                    <div>
                        <span ><h2>Tags</h2></span>
                        <label for="t1">Sri Lankan</label> <input id="t1" type="checkbox" name="tags[]" value="Sri Lankan"> ,
                        <label for="t2">Festival</label><input id="t2" type="checkbox" name="tags[]" value="Festival"> ,
                        <label for="t3">Baked</label><input id="t3" type="checkbox" name="tags[]" value="Baked"> ,
                        <label for="t4">Vegetarian</label> <input id="t4" type="checkbox" name="tags[]" value="Vegetarian"> ,
                        <label for="t5">Non Vegetarian</label><input id="t5" type="checkbox" name="tags[]" value="Non Vegetarian"> ,
                        <label for="t6">Chicken</label><input id="t6" type="checkbox" name="tags[]" value="Chicken"> ,
                        <label for="t7">Mutton</label><input id="t7" type="checkbox" name="tags[]" value="Mutton"> ,
                        <label for="t8">indian</label><input id="t8" type="checkbox" name="tags[]" value="Indian"> ,
                        <label for="t9">Fried</label><input id="t9" type="checkbox" name="tags[]" value="Fried"> ,
                        <label for="t10">Soup</label><input id="t10" type="checkbox" name="tags[]" value="Soup">
                        <label for="t10">Milk</label><input id="t10" type="checkbox" name="tags[]" value="Milk">
                      
                    </div>
                </div>
            </div>
            <div class="directions-control col-lg-9 col-sm-12" style="display:none;" id="fields">
                <label class="control-label" for="field1"><h3>Directions</h3></label>

                <div class="entry2">

                    <div class="col-lg-8 col-sm-5">
                        Step<span class="num">1</span>.
                        <textarea class="form-control" name="steps[]" rows="3" id="comment"></textarea>
                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <br>
                        <img src="Ambula/public/img/no_preview_available.jpg" class="output" width="75" height="75">
                    </div>
                    <div class="col-lg-2 col-sm-1">
                        <br><br>

                            <span class="file-input btn btn-primary btn-file glyphicon glyphicon-camera">
                              <input name="stepsimg[]" type="file" onchange="$('.output')[$('.output').length-1].src = window.URL.createObjectURL(this.files[0]);" class="btn btn-default" multiple>
                            </span>


                        <button class="btn btn-success btn-add" type="button">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>

                    </div>
                </div>

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
                        <a id="continuebtn" class="btn btn-lg btn-success continue">Continue >></a>
                    </div>
                    <div class="controls" style="margin-top: 2px">
                        <a id="backbtn" class="btn btn-lg btn-success back"><< Back</a>
                    </div>

                </div>
            </div>
        </div>
</fieldset>
</form>
</div>
<div id="loading" >
    <h4>Uploading Recipe</h4>
    <h6>will take a moment</h6>
    <img src="/Ambula/public/img/loading.gif">
</div>

<script type="text/javascript" src="../public/js/registration/validator.js"></script>
<script type="text/javascript" src="../public/js/recipes/script.js"></script>


</body>
</html>