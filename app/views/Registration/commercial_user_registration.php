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

    <style>
        body{
            padding-top:60px;
        }

        .logo {
            /* Rounded Corners */
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;

            border: 1px solid #E0D6CC;
        }

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

        .registration-container-2 {

        }

        .btn-file {
            margin-left: 12px;
            position: relative;
            overflow: hidden;
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
            background: red;
            cursor: inherit;
            display: block;
        }

        input[readonly] {
            background-color: white !important;
            cursor: text !important;
        }

        .compulsory {
            color: red;
            font-weight: bold;
        }

        .form-control, .btn {
            border-radius: 0px;
        }

    </style>
</head>

<body id="registration">

<div class="container">
    <div class="row">
        <!--Header START -->
        <?php $this->view('_template/navigation_menu', "newRecipe") ?>
    </div>

    <div class="row" style="background:#ffffff;">
        <form data-toggle="validator" role="form" action="/Ambula/registration/register_commercial_user"
              method="POST" onsubmit="$(this).hide();">
            <div class="col-lg-6" style="padding-top: 10px">
                <div id="legend">
                    <legend class="">Company Details</legend>
                </div>

                <div class="row">
                    <div class="form-group col-lg-10">
                        <!-- Company Name -->
                        <label class="control-label" for="company_name"><span class="compulsory">*</span> Company
                            Name</label>

                        <div class="controls">
                            <input type="text" id="company_name" maxlength="20" name="company_name" placeholder=""
                                   class="form-control" required>
                        </div>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-10">
                        <!-- Address 1 -->
                        <label class="control-label" for="address_1"><span class="compulsory">*</span> Street Address
                        </label>

                        <div class="controls">
                            <input type="text" id="address_1" name="address_1" placeholder=""
                                   class="form-control" required>
                        </div>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-5">
                        <!-- Telephone hotline-->
                        <label class="control-label" for="Telephone_1"><span class="compulsory">*</span>
                            Telephone(hotline)</label>

                        <div class="controls">
                            <input type="text" id="Telephone_1" name="telephone_1"
                                   pattern="\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})" data-minlength="10"
                                   data-error="Invalid Telephone Number" placeholder="" class="form-control" required>

                            <p class="help-block with-errors"></p>
                        </div>
                    </div>
                    <div class="form-group col-lg-5">
                        <!-- Password -->
                        <label class="control-label" for="Telephone_2">Telephone 2</label>

                        <div class="controls">
                            <input type="text" id="Telephone_2" name="telephone_2"
                                   pattern="\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})" data-minlength="10"
                                   data-error="Invalid Telephone Number" placeholder="" class="form-control">

                            <p class="help-block with-errors"></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <!-- Password-->
                        <label class="control-label" for="city"><span class="compulsory">*</span> City</label>

                        <div class="controls">
                            <input type="text" id="city" data-error="" name="city" placeholder="" class="form-control"
                                   required>

                            <p class="help-block with-errors"></p>
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <!-- Password -->
                        <label class="control-label" for="district"><span class="compulsory">*</span> District</label>

                        <div class="controls">
                            <!--<input type="postal_code" id="district" name="district"
                                   placeholder=""
                                   class="form-control">-->
                            <select class="form-control" id="district" name="district" required>
                                <option value="" selected hidden disabled>Select a district..</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapur">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavuniya">Vavuniya</option>
                            </select>

                            <p class="help-block with-errors"></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-8">
                        <!-- this div is for formating the ui design -->
                    </div>

                    <button type="button" class="btn btn-success" id="continue">Continue</button>

                </div>
            </div>
            <div class="col-lg-6 registration-container-2"
                 style="display:none; border-left: 1px solid #B2B2B2;padding-left: 25px; padding-top: 10px;">

                <div id="legend">
                    <legend class="">Login Details</legend>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <!-- E-mail -->
                        <label class="control-label" for="email">E-mail</label>

                        <div class="controls">
                            <input type="email" data-native-error="invalid email format" id="email" name="email"
                                   data-remote="/Ambula/registration/checkEmail" placeholder="yourname@domain.com"
                                   class="form-control"
                                   data-error="The email address you have entered already has an account" required>


                            <p class="help-block with-errors">Please provide your E-mail</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <!-- User Name -->
                        <label class="control-label" for="user_name">Username</label>

                        <div class="controls">
                            <input type="text" id="username" name="username" placeholder="" class="form-control"
                                   pattern="^[A-Za-z0-9_-]{3,16}$"
                                   data-native-error="username should at least contain 3 Characters (letter numbers and underscore)"
                                   data-remote="/Ambula/registration/checkUserName"
                                   data-error="username already exists ,choose a different one" maxlength="10" required>

                            <p class="help-block with-errors"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <!-- Password-->
                        <label class="control-label" for="password">Password</label>

                        <div class="controls">
                            <input type="password" id="password" data-minlength="6"
                                   data-error="Password should contain at least 6 characters" name="password"
                                   placeholder=""
                                   class="form-control"
                                   required>

                            <p class="help-block with-errors"></p>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <!-- Password -->
                        <label class="control-label" for="password_confirm">Password (Confirm)</label>

                        <div class="controls">
                            <input type="password" id="password_confirm" data-match="#password" name="password_confirm"
                                   placeholder=""
                                   class="form-control" required>

                            <p class="help-block with-errors">Please confirm password</p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <!-- Submit Button -->
                    <div class="controls">
                        <button class="btn btn-success">Register</button>
                    </div>
                </div>


            </div>
        </form>

    </div>
</div>

<script>
    //Continue button
    $(document).on('click', '#continue', function (e) {
        e.preventDefault();
        $(this).hide();
        $('.registration-container-1').hide();
        $('.registration-container-2').show();
    });
    var onResize = function () {
        // apply dynamic padding at the top of the body according to the fixed navbar height
        $("body").css("padding-top", $(".navbar-fixed-top").height()+6);
    };

    // attach the function to the window resize event
    $(window).resize(onResize);
</script>
</body>
</html>