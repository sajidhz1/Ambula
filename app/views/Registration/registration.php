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
    <link rel="icon" href="/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">


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
        .registration-container {
            background: rgb(255, 255, 255); /* for IE */
            padding: 2%;
            /* Rounded Corners */
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;

            border: 1px solid #E0D6CC;
            margin-top: 55px;

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

        .form-control, .btn {
            border-radius: 0px;
        }

        #commercialUserSignUpBlock {
            max-width: 400px;
            height: 300px;
            padding: 5%;
            margin: 5%;
        }
    </style>

    <script>
        var onResize = function () {
            // apply dynamic padding at the top of the body according to the fixed navbar height
            $(".registration-container").css("margin-top", $(".navbar-fixed-top").height() + 5);
        };

        // attach the function to the window resize event
        $(window).resize(onResize);
        $(window).onReady(onResize());
    </script>
</head>

<body id="registration">

<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>

<div class="container">
    <div class="row">

        <div class="col-lg-6 registration-container">
            <form data-toggle="validator" role="form" action='http://localhost/Ambula/registration/registerNewUser'
                  method="POST">

                <div id="legend">
                    <legend class="">Register</legend>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <!-- First Name -->
                        <label class="control-label" for="first_name">First Name</label>

                        <div class="controls">
                            <input type="text" id="firstname" maxlength="20" name="first_name" placeholder=""
                                   class="form-control" required>
                        </div>
                        <span class="help-block with-errors"></span>
                    </div>
                    <div class="form-group col-lg-6">
                        <!-- Username -->
                        <label class="control-label" for="last_name">Last Name</label>

                        <div class="controls">
                            <input type="text" id="lastname" maxlength="20" name="last_name" placeholder=""
                                   class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <!-- E-mail -->
                        <label class="control-label" for="email">E-mail</label>

                        <div class="controls">
                            <input type="email" data-native-error="invalid email format" id="email" name="email"
                                   data-remote="/Ambula/registration/checkEmail" placeholder="" class="form-control"
                                   data-error="The email address you have entered already has an account" required>

                            <p class="help-block with-errors">Please provide your E-mail</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <!-- E-mail -->
                        <label class="control-label" for="email">Username</label>

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
                                   placeholder="" class="form-control" required>

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
                    <!-- Register Button -->
                    <div class="controls">
                        <button class="btn btn-success" style="min-width: 163px">Register</button>
                    </div>
                </div>
            </form>

            <a href="registerWithFacebook" class="btn btn-primary"> SignUp with facebook</a>
        </div>
        <div class="col-lg-6" id="commercialUserSignUpBlock" style="margin-top:75px;background: #fff; ">
            <p style="text-align: center;"> Are you a prominent organization related to food in Sri Lanka, Then Join us
                as a Corporate user and broaden your market Locally and internationally</p>
            <a href="/Ambula/registration?user_type=commercial_user" style="margin: 0% 20% 0% 20%;"
               class="btn btn-danger col-lg-offset-4">Signup
                as Co-Operate User</a>
        </div>


        <a href="registerWithFacebook" class="btn btn-primary"> SignUp with facebook</a>
    </div>
    <div class="col-lg-6">
        <div style="margin-top:75px;background: #fff;padding:10px; ">
            <p style="text-align: center;color: brown;"> Are you a prominent organization related to food in Sri Lanka,
                Then Join us as a Corporate user and broaden your market Locally and internationally</p>
            <a href="/Ambula/registration?user_type=commercial_user" style="" class="btn btn-danger col-lg-offset-4">Signup
                as Co-Operate User</a>
        </div>

    </div>
</div>
</body>
</html>