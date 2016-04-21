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


    <link href="/Ambula/public/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="/Ambula/public/css/w3.css" rel="stylesheet" media="screen"/>

    <!-- fav icon -->
    <link rel="icon" href="http://localhost/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/registration/validator.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/typeahead.js"></script>


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




    <script type="text/javascript">


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

    <style>
        body {
            background: url("/Ambula/public/img/food_tile1.jpg") repeat fixed center top transparent;
        }

        #promotion-container {
            background: rgb(255, 255, 255); /* for IE */
            border: 1px solid #E0D6CC;
            float: none;
            padding-top: 10px;
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 0px;
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

        .compulsory {
            color: red;
            font-weight: bold;
        }

    </style>
</head>

<body>
<div class="container-fluid">
    <!--Header START -->
    <div class="row">
        <?php $this->view('_template/navigation_menu', "newPromotion"); ?>
    </div>

    <div class="row" id="promotionAddRow">
        <div class="col-lg-6 col-md-8 col-sm-8 col-xsm-12 center-block" id="promotion-container">
            <form id="newPromotionForm" data-toggle="validator" role="form"
                  action="/Ambula/promotion/addNewPromotion" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-lg-12">
                        <legend class="">New Promotion</legend>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <!-- Promotion Type -->
                        <label class="control-label" for="promotion_type"><span class="compulsory">*</span>Promotion
                            Type</label>

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
                        <label class="control-label" for="promotion_name"><span class="compulsory">*</span>Promotion
                            Name</label>

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
                        <label class="control-label" for="promo_image"><span class="compulsory">*</span>Promotional
                            image</label>

                        <div class="input-group control">
							<span class="input-group-btn">
								<span class="btn btn-primary btn-file">
									Browse&hellip; <input type="file" name="promo_image" id="promo_image"
                                                          onchange="readURL(this);" data-filesize="3000"
                                                          data-filesize-error="Max 3000B" accept="image/*" required>
								</span>
								<img id="image" src="/Ambula/public/img/no_preview_available.jpg" alt="default image"/>
							</span>

                        </div>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <!-- Description -->
                        <label class="control-label" for="description"><span class="compulsory">*</span>Promotion
                            Description</label>

                        <div class="controls">

                            <textarea id="editor1" name="description" class="ckeditor col-lg-12 col-sm-12" rows="15"
                                      cols="40" placeholder="max 255 characters" maxlength="255" required></textarea>

                            <!--<textarea id="description" name="description" class="form-control" style="height: 120px; resize: none;" required>
                            </textarea>-->
                        </div>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-4">
                        <!-- Start date -->
                        <label class="control-label" for="start_date"><span class="compulsory">*</span>Starting Date</label>

                        <div class="controls">
                            <input id="startdate" name="start_date" class="form-control celenderForPromo"
                                   pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$"
                                   data-error="Please Pick a Valid Date" required>
                        </div>
                        <span class="help-block with-errors"></span>
                    </div>
                    <div class="form-group col-lg-4">
                        <!-- End date -->
                        <label class="control-label" for="end_date"><span class="compulsory">*</span>Ending Date</label>

                        <div class="controls">
                            <input id="enddate" name="end_date" class="form-control celenderForPromo"
                                   pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$"
                                   data-error="Please Pick a Valid Date" required>
                        </div>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>

                <!--                <div class="row">-->
                <!--                    <div class="form-group col-lg-6">-->
                <!--                        <!-- Promotion priority -->
                <!--                        <label class="control-label" for="priority">Promotion Priority</label>-->
                <!---->
                <!--                        <div class="controls">-->
                <!--                            <select class="form-control" id="priority" name="priority" required>-->
                <!--                                <option value="normal">Normal</option>-->
                <!--                                <option value="medium">Medium(+500 Rs)</option>-->
                <!--                                <option value="high">High(+1000 Rs)</option>-->
                <!--                            </select>-->
                <!--                        </div>-->
                <!--                        <span class="help-block with-errors"></span>-->
                <!--                    </div>-->
                <!--                </div>-->

                <div class="row">
                    <div class="form-group col-lg-3">
                        <!-- Button -->
                        <div class="controls">
                            <button id="addPromo" class="btn btn-success form-control">Add Promo</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>


<!-- promotion uploading progress displaying modal-->
<div class="modal fade" id="progressModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="false"
     style=" overflow: scroll; height:auto;margin-top: 10%;" data-backdrop="false">
    <div class="modal-dialog modal-dialog-center" id="modalBody">
        <div class="modal-content" style="">


            <div class="modal-body">
                <div class="progress">
                    <div id="progress" class="progress-bar progress-bar-warning progress-bar-striped active"
                         role="progressbar">
                        <span>0%</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
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
<script src="https://cdn.rawgit.com/ilopX/jquery-ajax-progress/master/dist/jquery.ajax-progress.min.js"></script>
<script src="//cdn.ckeditor.com/4.5.3/basic/ckeditor.js"></script>
<script type="text/javascript" src="/Ambula/public/js/registration/validator.js"></script>
<script type="text/javascript" src="/Ambula/public/js/promotion/promotion.js"></script>
</body>
</html>
