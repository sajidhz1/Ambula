<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="http://localhost/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/registration.css" rel="stylesheet" media="screen"/>

    <!-- fav icon -->
    <link rel="icon" href="/public/img/fav_ico.png" type="image/gif" sizes="16x16">


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
        #profile_img {
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;

            border: 1px solid #E0D6CC;
            display: block;
            margin: auto;
            margin-top: 10px;
            /* Rounded Corners */

        }

        h4,h5 {
            text-align: center;
        }

        .btn-file {
            position: relative;
            overflow: hidden;
            margin-top: 7px;

        }

        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;

        }

        .category-group{
            margin-bottom: 25px;
        }

        .category-group label {
            min-width: 174px;
            background-color: #8ABB55;
        }

        .category-group input{
            /*margin-right: 2%;*/
        }

        .category-group div{
            display: inline-block;
        }

        .container{
            width: 99%;
        }
    </style>
</head>

<body>

<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>

<div class="container">
    <form data-toggle="validator" role="form" action='http://localhost/Ambula/registration/update_commercial_user' method="POST"  enctype="multipart/form-data">
    <div class="container mrg50T">
        <h4 class="txt-red">Almost There Just One Step to go !</h4>

        <div class="col-lg-4 hgt600" style="background-color: #ffc266;">
            <h4>Company Logo</h4>
            <img src="http://localhost/Ambula/public/img/no_preview_available.jpg" height="175" width="175"
                 id="profile_img" alt=""/>

            <div class="text-center">
                <span class="btn btn-default btn-file">
                     Browse <input type="file"
                                   onchange="$('#profile_img').attr('src' ,window.URL.createObjectURL(this.files[0]));$('.logo-save').show();" name="company_logo">
                </span>

            </div>
            <br>

            <div class="col-lg-10" style="margin-bottom:15px;margin-top: 20px;">
                <label class="control-label" for="last_name">Website </label>
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                    <input id="login-username" type="text" class="form-control" name="web_site_url" value=""
                           placeholder="http://theambula.lk/">
                </div>
            </div>

            <div class="col-lg-10" style="margin-bottom:15px;">
                <label class="control-label" for="last_name">Facebook Page URL </label>
                <div class="input-group ">
                    <span class="input-group-addon" style="font-weight: 600;">f</span>
                    <input id="login-username" type="text" class="form-control" name="facebook_url" value=""
                           placeholder="https://www.facebook.com/the.ambula">
                </div>
            </div>




            <div class="col-lg-10">
                <label class="control-label" for="last_name">Youtube channel URL</label>
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-play"></i></span>
                    <input id="login-username" type="text" class="form-control" name="youtube_url" value=""
                           placeholder="username or email">
                </div>
            </div>

        </div>

        <div class="col-lg-8" style="padding-top:15px;background: #e8e8e8;">

            <div class="col-lg-12">
                <h4 style="margin-bottom: 15px;"> Short Description</h4>

                <div class="input-group" style="width: 100%">
                    <div class="col-lg-12 col-xs-12 col-sm-12">
                        <textarea id="editor1" name="description" class="ckeditor col-lg-12 col-sm-12" rows="15"
                                  cols="40"></textarea>

                    </div>
                    <br>
                </div>
            </div>

            <div class="col-lg-12 category-group">
                <h5 style="margin-bottom: 15px;margin-top: 25px;"> Categories</h5>

                <div class="col-lg-4">
                    <ul>
                        <li>
                            <label for="checkboxes1">Beverages</label>
                            <input id="checkboxes1" name="checkboxes[]" value="beverages" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes2">Dairy Products</label>
                            <input id="checkboxes2" name="checkboxes[]" value="dairyProducts" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes3">Frozen Foods</label>
                            <input id="checkboxes3" name="checkboxes[]" value="frozenFoods" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes4">Canned Foods/Meat</label>
                            <input id="checkboxes4" name="checkboxes[]" value="cannedFoods" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes5">Jam</label>
                            <input id="checkboxes5" name="checkboxes[]" value="jam" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes6">Sauces</label>
                            <input id="checkboxes6" name="checkboxes[]" value="sauces" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes7">Processed Meat</label>
                            <input id="checkboxes7" name="checkboxes[]" value="processedMeat" type="checkbox">
                        </li>
                    </ul>

                </div>

                <div class="col-lg-4">
                    <ul>
                        <li>
                            <label for="checkboxes8">Noodles</label>
                            <input id="checkboxes8" name="checkboxes[]" value="noodles" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes9">Pasta/Spagetti</label>
                            <input id="checkboxes9" name="checkboxes[]" value="Pasta/Spagetti" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes10">Soya Products</label>
                            <input id="checkboxes10" name="checkboxes[]" value="soyaProducts" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes11">Flour</label>
                            <input id="checkboxes11" name="checkboxes[]" value="flour" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes12">Spices</label>
                            <input id="checkboxes12" name="checkboxes[]" value="spices" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes13">Grain Products</label>
                            <input id="checkboxes13" name="checkboxes[]" value="grainProducts" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes14">Flavour Enhancers</label>
                            <input id="checkboxes14" name="checkboxes[]" value="flavourEnhancers" type="checkbox">
                        </li>
                    </ul>

                </div>

                <div class="col-lg-4">
                    <ul>
                        <li>
                            <label for="checkboxes15">Biscuits/Cookies</label>
                            <input id="checkboxes15" name="checkboxes[]" value="biscuits/cookies" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes16">Bee Honey/Kitul Trickle</label>
                            <input id="checkboxes16" name="checkboxes[]" value="honey/kitulTrickle" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes17">Food Coloring/Flavoring</label>
                            <input id="checkboxes17" name="checkboxes[]" value="Test" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes18">Ice Cream</label>
                            <input id="checkboxes18" name="checkboxes[]" value="icecream" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes19">Margarine/Spreads</label>
                            <input id="checkboxes19" name="checkboxes[]" value="margarine/spreads" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes20">Coconut Oil/Cooking Oil</label>
                            <input id="checkboxes20" name="checkboxes[]" value="coconutOil" type="checkbox">
                        </li>

                        <li>
                            <label for="checkboxes21">Fresh Vegetables/Fruits</label>
                            <input id="checkboxes21" name="checkboxes[]" value="freshVegetables/fruits" type="checkbox">
                        </li>
                    </ul>

                </div>

            </div>


        </div>


    </div>
    <div class="text-center" style="margin-top: 5px;margin-bottom: 20px;">
        <a href="" class="btn btn-default ">Skip >></a>
        <button class="btn btn-success">Save</button>

    </div>
      <input type="hidden" name="user_name" value="<?php echo $_GET['user']; ?>" />
    </form>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.config.height = 400;
        config.extraPlugins = 'onchange';
        CKEDITOR.replace('editor1');

        CKEDITOR.on('change', function (e) {
            alert('');
        });


    </script>

    <script type="text/javascript" src="../public/js/registration/validator.js"></script>
    <script type="text/javascript" src="../public/js/recipes/script.js"></script>
    <script src="//cdn.ckeditor.com/4.5.3/basic/ckeditor.js"></script>
</div>
</body>
</html>