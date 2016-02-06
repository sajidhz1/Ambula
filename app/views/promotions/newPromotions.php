<?php
/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 8/6/2015
 * Time: 11:02 PM
 */
?>


<?php
/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 8/2/2015
 * Time: 6:16 PM
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="http://localhost/Ambula/public/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>

    <!-- fav icon -->
    <link rel="icon" href="http://localhost/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">

    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/registration/validator.js"></script>
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

    <!-- Calendar -->
    <link href="http://localhost/Ambula/public/js/calendar/jquery-ui.min.css" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/calendar/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#startdate").datepicker();
            $("#enddate").datepicker();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        /*$(document).ready(function () {
         $("#email").blur(function () {
         var em = $("#email").val();

         if (em != '') {
         $.ajax({
         url:  "http://localhost/Ambula/Promotion/checkEmailsInPromoAdder",
         type: "post",
         data: {email: em},
         dataType: 'json',
         async: false,
         success: function (response) {
         if(!response)
         {
         var redirectWindow = window.open('http://localhost/Ambula/Promotion/viewNewPromoAdderForm','_blank');
         redirectWindow.location;
         }else{
         //alert('email exists');
         }
         }
         });
         } else {

         }
         });
         });*/

    </script>

    <style>
        body {
            background: url("/Ambula/public/img/food_tile1.jpg") repeat fixed center top transparent;
        }

        .registration-container {
            background: rgb(255, 255, 255); /* for IE */
            padding: 2%;
            /* Rounded Corners */
            border-radius: 0px;
            border: 1px solid #E0D6CC;
            float: right;
            margin-right: 25%;
            margin-left: 22%;

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

        #image {
            float: right;
            width: 200px;
            height: 150px;
            border: groove;
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

    </style>
</head>

<body>
<div class="container-fluid">
    <!--Header START -->
    <?php $this->view('_template/navigation_menu', "newPromotion"); ?>


    <div class="col-lg-6 registration-container">
        <form id="newPromotionForm" data-toggle="validator" role="form"
              action="/Ambula/Promotion/addNewPromotion" method="POST" enctype="multipart/form-data">

            <div id="legend">
                <legend class="">New Promotion</legend>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <!-- Promotion Type -->
                    <label class="control-label" for="promotion_type">Promotion Type</label>

                    <div class="controls">
                        <select class="form-control" id="promotype" name="promotion_type" required>
                            <option value="restaurant">Restaurant</option>
                            <option value="foodproduct">Food Product</option>
                            <option value="culinary_equipment">Culinary Equipment</option>
                        </select>
                    </div>
                    <span class="help-block with-errors"></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-8">
                    <!-- Promtoion Name -->
                    <label class="control-label" for="promotion_name">Promotion Name</label>

                    <div class="controls">
                        <input type="text" id="promotionname" name="promotion_name" placeholder=""
                               class="form-control" required>
                    </div>
                    <span class="help-block with-errors"></span>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-8">
                    <!-- Promotion image -->
                    <label class="control-label" for="promo_image">Promotional image</label>

                    <div class="input-group control">
							<span class="input-group-btn">
								<span class="btn btn-primary btn-file">
									Browse&hellip; <input type="file" name="promo_image" id="promo_image"
                                                          onchange="readURL(this);">
								</span>
								<img id="image" src="/Ambula/public/img/default_promotion.jpg" alt="default image"/>
							</span>

                    </div>
                    <span class="help-block with-errors"></span>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-8">
                    <!-- Description -->
                    <label class="control-label" for="description">Promotion Description</label>

                    <div class="controls">
							<textarea id="description" name="description"
                                      class="form-control" style="height: 120px; resize: none;" required>
							</textarea>
                    </div>
                    <span class="help-block with-errors"></span>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-4">
                    <!-- Start date -->
                    <label class="control-label" for="start_date">Starting Date</label>

                    <div class="controls">
                        <input id="startdate" name="start_date" class="form-control"
                               data-error="Invalid Date" required>
                    </div>
                    <span class="help-block with-errors"></span>
                </div>
                <div class="form-group col-lg-4">
                    <!-- End date -->
                    <label class="control-label" for="end_date">Ending Date</label>

                    <div class="controls">
                        <input id="enddate" name="end_date" class="form-control"
                               data-error="Invalid Date" required>
                    </div>
                    <span class="help-block with-errors"></span>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6">
                    <!-- Promotion priority -->
                    <label class="control-label" for="priority">Promotion Priority</label>

                    <div class="controls">
                        <select class="form-control" id="priority" name="priority" required>
                            <option value="normal">Normal</option>
                            <option value="medium">Medium(+500 Rs)</option>
                            <option value="high">High(+1000 Rs)</option>
                        </select>
                    </div>
                    <span class="help-block with-errors"></span>
                </div>
            </div>
            <div class="form-group">
                <!-- Button -->
                <div class="controls">
                    <button id="addPromo" class="btn btn-success">Add Promo</button>
                </div>
            </div>
        </form>

    </div>
</div>

</body>
</html>
