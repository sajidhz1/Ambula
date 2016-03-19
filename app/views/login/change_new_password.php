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

    <!-- fav icon -->
    <link rel="icon" href="/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/bootstrap.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/registration/validator.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
    <link type="text/css" rel="stylesheet" href="/public/css/style.css"/>

    <style>
        body {
            background: url(/public/img/tile.jpg) repeat fixed;

        }

        .container {

        }

        .error-message {
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
                        <div class="">
                            <div class="text-center">
                                <img src="/Ambula/public/img/fav_ico.png" class="login" height="70">
                            </div>

                            <h3 class="text-center">Password reset</h3>

                            <p>Enter your new password</p>

                            <div class="panel-body">

                                <form class="form" data-toggle="validator"
                                      action="changePassword?h=<?= $_GET['h'] ?>&email=<?= $_GET['email'] ?>"
                                      method="post"><!--start form--><!--add form action as needed-->
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="passInput">Password</label>

                                            <div class="input-group col-md-12">
                                                <input id="passInput" name="password" placeholder=""
                                                       class="form-control"
                                                       oninvalid="setCustomValidity('Password should contain at least 6 characters ')"
                                                       data-minlength="6"
                                                       onchange="try{setCustomValidity('')}catch(e){}" type="password"
                                                       required>
                                            </div>
                                            <span class="help-block with-errors"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="passInput2">Confirm Password</label>

                                            <div class="input-group col-md-12">
                                                <input id="passInput2" data-match="#passInput" name="confirm_password"
                                                       placeholder="" class="form-control"
                                                       oninvalid="setCustomValidity('Password mismatch')"
                                                       onchange="try{setCustomValidity('')}catch(e){}" type="password"
                                                       required>
                                            </div>
                                            <span class="help-block with-errors"></span>
                                        </div>

                                        <div class="form-group">
                                            <input class="btn btn-lg btn-primary btn-block" value="Continue"
                                                   type="submit">
                                        </div>
                                    </fieldset>
                                </form>
                                <!--/end form-->


                            </div>
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
