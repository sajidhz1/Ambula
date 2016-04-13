<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="=/Ambula/public/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="/Ambula/public/css/slider.css" rel="stylesheet">
    <link href="/Ambula/public/css/font-awesome.min.css" rel="stylesheet">
    <link href="/Ambula/public/css/w3.css" rel="stylesheet">

    <!-- fav icon -->
    <link rel="icon" href="/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/typeahead.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/script.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/registration/validator.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/modernizr.js"></script>
    <script type="text/javascript" src="//cdn.ckeditor.com/4.5.3/basic/ckeditor.js"></script>


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

        $(window).resize(onResize);

        $(document).ready(function () {
            onResize();
            commercialUserUpdateContinue();
        });


        function onResize() {
            // apply dynamic padding at the top of the body according to the fixed navbar height
            $("#addCommUserContinueRow").css("margin-top", $(".navbar-fixed-top").height() + 10);
        }

        //JS + ajax method to update the Database using the data in the edit modal data feilds
        function commercialUserUpdateContinue() {
            $('#addCommUserContinueForm').validator().on('submit', function (e) {

                // Prevent form submission
                if (e.isDefaultPrevented()) {
                    // handle the invalid form

                } else {
                    // Prevent form submission
                    e.preventDefault();

                    $('#loadingGif').toggle();//show loading animation while submitting the form
                    $('#addCommUserContinueForm').toggle(); //Hide the form while submitting

                    //check if the description is updated
                    for (instance in CKEDITOR.instances) {
                        CKEDITOR.instances[instance].updateElement();
                    }


                    var form = document.getElementById('addCommUserContinueForm');
                    var formData = new FormData(form);

                    // Use Ajax to submit form data
                    $.ajax({
                        url: $(this).attr('action'),
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'POST',
                        success: function (response) {
                            if (response) {
                                window.location.replace("http://localhost/Ambula/login");
                            } else {
                                window.location.replace("http://localhost/Ambula/");
                            }
                        }, error: function (exception) {
                            console.log('error-com-user', exception);
                        }
                    });
                }

            });
        }

    </script>

    <style>
        #addCommUserContinueRow {
            padding-left: 5px;
            padding-right: 5px;
        }

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

        h4, h5 {
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

        .category-group {
            margin-bottom: 25px;
        }

        .category-group label {

            min-width: 173px;
            background-color: #ffa366;

        }

        .category-group input {
            /*margin-right: 2%;*/
        }

        .category-group div {
            display: inline-block;
        }

        .btn {
            border-radius: 0px;
        }

        #loadingGif {
            display: none;
            margin-top: 10%;
        }

    </style>
</head>

<body>

<!--Header START -->
<div class="container-fluid">
    <div class="row">
        <?php $this->view('_template/navigation_menu', "newRecipe") ?>
    </div>
    <div class="row" id="addCommUserContinueRow">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xsm-12" id="addCommUserContinueCol">
            <div class="text-center">
                <img id="loadingGif" src='/Ambula/public/img/loading_image.gif' class='center-block img-responsive'>
            </div>
            <form id="addCommUserContinueForm" data-toggle="validator" role="form"
                  action='/Ambula/registration/update_commercial_user'
                  method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="txt-red">Almost There Just One More Step to go !</h4>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-4">
                        <div class="row">
                            <div class="form-group col-lg-12 text-center">
                                <h4>Company Logo</h4>
                                <img src="http://localhost/Ambula/public/img/no_preview_available.jpg" height="175"
                                     width="175"
                                     id="profile_img" alt=""/>

                                <div class="controls">
                            <span class="btn btn-default btn-file">
                            Browse <input id="file" type="file"
                                          onchange="$('#profile_img').attr('src' ,window.URL.createObjectURL(this.files[0]));$('.logo-save').show();"
                                          name="company_logo" required
                                          data-error='Please Select an Image File For Your Company Logo'>
                            </span>
                                </div>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-11">
                                <label class="control-label" for="last_name">Website </label>

                                <div class="controls">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="web_site_url"
                                               value=""
                                               placeholder="http://theambula.lk/">
                                    </div>
                                </div>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-11">
                                <label class="control-label" for="last_name">Facebook Page URL </label>

                                <div class="controls">
                                    <div class="input-group ">
                                        <span class="input-group-addon"><i class="fa fa-facebook-official"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="facebook_url"
                                               value=""
                                               placeholder="https://www.facebook.com/the.ambula">
                                    </div>
                                </div>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-11">
                                <label class="control-label" for="last_name">Youtube channel URL</label>

                                <div class="controls">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-play"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="youtube_url"
                                               value=""
                                               placeholder="username or email">
                                    </div>
                                </div>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8" style="padding-top:15px;background: #e8e8e8;">
                        <div class="row">
                            <div class="form-group col-lg-12 col-xs-12 col-sm-12">
                                <h4> Short Description</h4>

                                <div class="controls">
                                    <div class="input-group" style="width: 100%">

                            <textarea id="editor1" name="description" class="ckeditor col-lg-12 col-sm-12"
                                      rows="11" style="resize: none"></textarea>
                                    </div>
                                </div>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 category-group">
                                <h5> Categories</h5>

                                <div class="col-lg-4">
                                    <ul>
                                        <?php
                                        $arr = json_decode($this->loadCategories(), true);
                                        $count = 0;
                                        foreach ($arr as $category) {
                                            ?>

                                            <li>
                                                <label for="checkboxes1"><?= $category['title'] ?></label>
                                                <input id="checkboxes1" name="cat_checkbox[]"
                                                       value="<?= $category['id_product_categories'] ?>"
                                                       type="checkbox">
                                            </li>

                                            <?php
                                            $count++;
                                            if ($count == 7) {
                                                echo '</ul></div><div class="col-lg-4"><ul>';
                                                $count = 0;
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xsm-12 text-center"
                         style="margin-top: 5px;margin-bottom: 20px;">
                        <button class="btn btn-success" style="width: 100px">Save</button>
                    </div>
                </div>
            </form
        </div>
    </div>
</div>

</body>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    //CKEDITOR.config.height = 400;
    config.extraPlugins = 'onchange';
    CKEDITOR.replace('editor1');

    CKEDITOR.on('change', function (e) {

    });

</script>

</html>