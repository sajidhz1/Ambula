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
        .registration-container-1, .registration-container-2{
            background: rgb(255, 255, 255); /* for IE */
            padding: 2%;
            /* Rounded Corners */
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;

            border: 1px solid #E0D6CC;
            margin-top: 55px;

        }
        .logo{
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

        .registration-container-2{
            display: none;
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

        .compulsory{
            color: red;
            font-weight: bold;
        }

    </style>
</head>

<body id="registration">

<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>

<div class="container">
    <form data-toggle="validator" role="form" action="http://localhost/Ambula/registration/register_commercial_user"  method="POST"  >
    <div class="col-lg-6 registration-container-1">
        <div id="legend">
            <legend class="">Company Details</legend>
        </div>

        <div class="row">
            <div class="form-group col-lg-8">
                <!-- Company Name -->
                <label class="control-label" for="company_name"><span class="compulsory">*</span> Company Name</label>

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
                <label class="control-label" for="address_1"><span class="compulsory">*</span> Street Address </label>

                <div class="controls">
                    <input type="text" id="address_1"  name="address_1" placeholder=""
                           class="form-control" required>
                </div>
                <span class="help-block with-errors"></span>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <!-- Telephone hotline-->
                <label class="control-label" for="Telephone_1"><span class="compulsory">*</span> Telephone(hotline)</label>

                <div class="controls">
                    <input type="text" id="Telephone_1" pattern="\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})" data-minlength="10" data-error="invalid Telephone Number" name="telephone_1" placeholder="" class="form-control"
                           required>

                    <p class="help-block with-errors"></p>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <!-- Password -->
                <label class="control-label" for="Telephone_2">Telephone 2</label>

                <div class="controls">
                    <input type="text" id="Telephone2"  name="Telephone_2"
                           placeholder=""
                           class="form-control">

                    <p class="help-block with-errors"></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-5">
                <!-- Password-->
                <label class="control-label" for="city"><span class="compulsory">*</span> City</label>

                <div class="controls">
                    <input type="text" id="city"  data-error="" name="city" placeholder="" class="form-control"
                           required>

                    <p class="help-block with-errors"></p>
                </div>
            </div>
            <div class="form-group col-lg-4">
                <!-- Password -->
                <label class="control-label" for="postal_code"><span class="compulsory">*</span> District</label>

                <div class="controls">
                    <input type="postal_code" id="postal_code"  name="postal_code"
                           placeholder=""
                           class="form-control">

                    <p class="help-block with-errors"></p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-lg-offset-9">
            <a href="" id="continue" class="btn btn-success">Continue </a>
            </div>
    </div>
    <div class="col-lg-6 registration-container-2">

        <div id="legend">
            <legend class="">Login Details</legend>
        </div>
        <div class="row">
                <div class="form-group col-lg-8">
                    <!-- E-mail -->
                    <label class="control-label" for="email">E-mail</label>

                    <div class="controls">
                        <input type="email" data-native-error="invalid email format" id="email" name="email" data-remote="/Ambula/registration/checkEmail" placeholder="" class="form-control" data-error="The email address you have entered already has an account" required>


                        <p class="help-block with-errors">Please provide your E-mail</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6">
                    <!-- E-mail -->
                    <label class="control-label" for="user_name">Username</label>

                    <div class="controls">
                        <input type="text" id="username" name="username" placeholder="" class="form-control"
                               pattern="^[A-Za-z0-9_-]{3,16}$" data-native-error="username should at least contain 3 Characters (letter numbers and underscore)"  data-remote="/Ambula/registration/checkUserName" data-error="username already exists ,choose a different one"  maxlength="10"   required>

                        <p class="help-block with-errors"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <!-- Password-->
                    <label class="control-label" for="password">Password</label>

                    <div class="controls">
                        <input type="password" id="password" data-minlength="6" data-error="Password should contain at least 6 characters" name="password" placeholder="" class="form-control"
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
                    <button class="btn btn-default back" >Back</button>
                    <button class="btn btn-success">Register</button>
                </div>
            </div>


    </div>
    </form>

</div>
<script>
    //Continue button
    $(document).on('click', '#continue', function (e) {
        e.preventDefault();
        $('.registration-container-1').hide();
        $('.registration-container-2').show();
    });

    //back button
    $(document).on('click', '.back', function (e) {
        e.preventDefault();
        $('.registration-container-1').show();
        $('.registration-container-2').hide();
    });


</script>
</body>
</html>