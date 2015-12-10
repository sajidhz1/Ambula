<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="http://localhost/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>

    <!-- fav icon -->
    <link rel="icon" href="http://localhost/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">

    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/typeahead.js"></script>

    <script src="http://localhost/Ambula/public/js/bootstrap.min.js"></script>

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
        .registration-container {
            background: rgb(255, 255, 255); /* for IE */

            /* Rounded Corners */
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;

            border: 1px solid #E0D6CC;
            float: right;
            padding-bottom: 20px;

        }

        label.valid {
            width: 24px;
            height: 24px;
            background: url(http://localhost/Ambula/public/img/valid.png) center center no-repeat;
            display: inline-block;
            text-indent: -9999px;
        }

        label.error {
            font-weight: bold;
            color: red;
            padding: 2px 8px;
            margin-top: 2px;
        }

        #image{
            float: right;
            width: 200px;
            height: 150px;
            border: groove;
        }

        .uploader {position:relative; overflow:hidden;  background:#f3f3f3; border:2px dashed #e8e8e8;}

        #filePhoto1 , #filePhoto2{
            position:absolute;
            width:150px;
            height:150px;
            top:-50px;
            left:0;
            z-index:3;
            opacity:0;
            cursor:pointer;
        }

        .uploader img{
            position: relative;
            left  : -14px;
        }
    </style>
</head>

<body>

<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>
<div class="container-fluid pages">
    <div class="col-lg-12 ingredients-control">
        <div class="col-lg-12 col-sm-12" id="fields">
            <label class="control-label" for="field1"><h3>New Products</h3></label>
            <br>
            <span id="ing_error" style="color: red;"></span>
            <br>

            <div class="col-xs-5 col-sm-3" style="color: brown"> Name</div>
            <div class="col-xs-5 col-sm-2" style="color: brown"> Category</div>
            <div class="col-xs-2 col-sm-3" style="color: brown"> Short Description</div>
            <div class="col-xs-2 col-sm-4" style="color: brown">Thumbnail Image</div>
            <br>
            <br>

            <div class="entry" >
                <div  class="row" style="margin-bottom: 15px;" >
                    <div class="col-xs-5 col-sm-5 col-lg-3">
                        <input class="form-control" name="ingname[]" type="text"
                               placeholder="Example : sugar , salt"/>
                    </div>
                    <div class="dropdown col-xs-3 col-sm-3 col-lg-2">
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
                    <div class="col-xs-2 col-sm-2 col-lg-3">
                        <textarea class="form-control" name="amount[]" placeholder="short description" type="text" ></textarea>
                    </div>
                    <div class="col-xs-1 col-sm-2 col-lg-4"  >
                        <div class="col-lg-8">
                            <div class="uploader col-lg-6" >

                                <img width="110" height="110" class="thumb" src="http://localhost/Ambula/public/img/no_preview_available.jpg"/>
                                <input type="file" name="userprofile_picture" onchange="$(this).siblings('img').attr('src' ,window.URL.createObjectURL(this.files[0]));" id="filePhoto1" />
                            </div>

                            <div class=" col-lg-6" >


                            </div>

                        </div>
                        <div class="col-lg-4" style="display: inline-block;vertical-align: middle;" >
                            <button class="btn btn-success btn-add" style="margin-top: 30%;" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>

                        </div>

                    </div>
                    <br>

                </div>
            </div>

        </div>
    </div>
</div>
<script>

   $(function() {

       //ingredients add dynamic fields
       $(document).on('click', '.btn-add', function (e) {
           e.preventDefault();

           var controlForm = $('.ingredients-control'),
               currentEntry = $(this).parents('.entry:first'),
               newEntry = $(currentEntry.clone()).appendTo(controlForm);

           newEntry.find('input').val('');
           newEntry.find('img').attr('src','http://localhost/Ambula/public/img/no_preview_available.jpg');
           controlForm.find('.entry:not(:last) .btn-add')
               .removeClass('btn-add').addClass('btn-remove')
               .removeClass('btn-success').addClass('btn-danger')
               .html('<span class="glyphicon glyphicon-minus"></span>');
       }).on('click', '.btn-remove', function (e) {
           $(this).parents('.entry:first').remove();

           e.preventDefault();
           return false;
       });
   });




</script>
</body>
</html>
