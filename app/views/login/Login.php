<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="http://localhost/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>

    <!-- fav icon -->
    <link rel="icon" href="/public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/bootstrap.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
    <link type="text/css" rel="stylesheet" href="/public/css/style.css"/>

    <style>
        body {
            background: url(/Ambula/public/img/tile.jpg) repeat fixed;

        }

        .error-message {
            color: #ff0000;
            padding: 5px;
            font-size: 1.1em;
        }
    </style>
</head>

<body>

<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>

<div class="container pages">
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-0">
        <?php
        $getprevious = Session::get('refferer');
        $getpreviousCommercial = Session::get('reffererCommercial');

        if (isset($_SESSION['refferer'])) {
            ?>
            <div class="alert alert-success">
                You Have <strong>Successfully!</strong> Registered With Ambula.
                Login with your email and password
            </div>
            <?php
            Session::set('refferer', null);
        } else if (isset($_SESSION['reffererCommercial'])) {
            ?>
            <div class="alert alert-success">
                You Have <strong>Successfully!</strong> Registered With Ambula Promotions As a Co-Operate User.
                Login with your email and password
            </div>
            <?php
            Session::set('reffererCommercial', null);
            Session::destroy();
        }
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
                <div
                    style="float:right; font-size: 80%; position: relative; top:-10px;font-size: 1.0em;padding-bottom:10px;font-weight: 200;"></div>
            </div>

            <div style="padding-top:30px" class="panel-body">


                <?php
                $feedback_negative = Session::get('feedback_negative');
                if (isset($feedback_negative)) {
                    echo '<div class="alert alert-danger">' . Session::get("feedback_negative") . '</div>';
                }
                Session::set("feedback_negative", null);
                ?>

                <form id="loginform" action="http://localhost/Ambula/login/login" method="post" class="form-horizontal"
                      role="form">

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon" style="border-radius: 0px"><i
                                class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username" value=""
                               placeholder="username or email" style="border-radius: 0px">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon" style="border-radius: 0px"><i
                                class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password"
                               placeholder="password" style="border-radius: 0px">
                    </div>


                    <div class="input-group">
                        <div class="checkbox">
                            <label>
                                <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                            </label>
                        </div>
                    </div>


                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <input type="submit" id="btn-login" class="btn btn-success" value="Login"
                                   style="border-radius: 0px"/>
                            <a id="btn-fblogin" href="/registration/registerWithFacebook" class="btn btn-primary"
                               style="border-radius: 0px">Login with Facebook</a>
                        </div>
                    </div>
                    <div style="margin: 10px;">
                        <a style="color: brown;" href="passwordReset">Forgot password?</a>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                Don't have an account ?
                                <a href="http://localhost/Ambula/registration">
                                    <h3 style="text-decoration: underline;">Sign Up Here</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php
