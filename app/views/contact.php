<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/public/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <link href="/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="/public/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/public/css/slider.css">

    <!-- fav icon -->
    <link rel="icon" href="/public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="/public/js/jquery-1.11.0.min.js"></script>
    <link type="text/css" rel="stylesheet" href="/public/css/style.css"/>

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

    <!--  ##### fav and touch icons ##### -->
    <!-- <link rel="shortcut icon" href="img/favicon.ico"> -->
    <!-- For third-generation iPad with high-resolution Retina display: -->
    <!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple144.png"> -->
    <!-- For iPhone with high-resolution Retina display: -->
    <!-- <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple114.png"> -->
    <!-- For first- and second-generation iPad: -->
    <!-- <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple72.png"> -->
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <!--<link rel="apple-touch-icon-precomposed" href="img/apple57.png"> -->

<style>
      h4{
          color: #333;
      }
  </style>

</head>

<body>
<!--Header START -->
    <?php $this->view('_template/navigation_menu',"contact") ?>

<!-- Header END -->
<div class="container pages">
    <h1>Don't hesitate to contact us</h1>
    <div class="col-lg-8">
        <form class="form-horizontal" role="form" style="width:650px;margin-left:auto;margin-right:auto;margin-top:50px;" class"col-lg-offset-2" method="post" action="index.php">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="message" class="col-sm-2 control-label">Message</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="4" name="message"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <! Will be used to display an alert to the user>
            </div>
        </div>
        </form>

    </div>
    <div class="col-lg-4" style="border-left:1px solid #B2B2B2; ">
        <h3>Problems Adding the Recipe ?</h3>
        <h4>Email us the Recipe<br> with photos</h4>
        <h4><i class="glyphicon glyphicon-envelope"></i> recipes@theambula.lk</h4>
        <br>
        <h4>Or call us on</h4>
        <h4><i class="glyphicon glyphicon-earphone"></i> 071-6431913</h4>
    </div>

</div>
<footer class="footer">

<div class="container" style="text-align:center;">
    <p class="text-muted">
       &copy; 2015 The Ambula
    </p>
</div>

</footer>
</body>
</html>
