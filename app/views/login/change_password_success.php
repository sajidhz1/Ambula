<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="http://localhost/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen" />
    <link href="http://localhost/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen" />
    <link href="http://localhost/Ambula/public/css/custom.css" rel="stylesheet" media="screen" />
    <link href="http://localhost/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>

    <!-- fav icon -->
    <link rel="icon" href="/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/bootstrap.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/registration/validator.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="/public/css/style.css" />

    <style>
        body{
            background: url(/public/img/tile.jpg)  repeat fixed;

        }
        .container{


        }

        .error-message{
            color: #ff0000;
            padding: 5px;
            font-size: 1.1em;
        }


    </style>
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
<div class="container pages">
    <div class="row">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <img src="/Ambula/public/img/fav_ico.png" class="login" height="70">
                            <?php if(isset($_GET["email_sent"])) {?>
                            <h3 class="text-center">Email Successfully sent</h3>
                            <p>A password reset link has been sent to your email :)</p>
                            <?php }else if(isset($_GET["password_changed"])){ ?>
                                <h3 class="text-center">Password successfully changed</h3>
                                <p>Your password has been Successfully changed  <label><a href="/Ambula/login">Login here</a></label> </p>
                           <?php }else if(isset($_GET["reset_link_expired"])){ ?>
                                <h3 class="text-center txt-red">Password Reset link Expired</h3>
                                <p>Your password reset link has expired Request for a new one <label><a href="/Ambula/login/passwordReset">Click Here</a></label> </p>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
<?php
