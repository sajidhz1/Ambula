<?php
/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 8/17/2015
 * Time: 10:08 PM
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
<html>

<head>
	<meta charset="utf-8">
	<title>The Ambula</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="../public/css/bootstrap.css" rel="stylesheet" media="screen"/>
	<link href="../public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
	<link href="../public/css/custom.css" rel="stylesheet" media="screen"/>
	<link href="../public/css/color1.css" rel="stylesheet" media="screen"/>
	<link href="../public/css/registration.css" rel="stylesheet" media="screen"/>


	<script type="text/javascript" src="../public/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../public/js/registration/validator.js"></script>
	<script type="text/javascript" src="../public/js/typeahead.js"></script>


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
			float: right;
			margin-right: 25%;
			margin-left: 22%;

		}

		label.valid {
			width: 24px;
			height: 24px;
			background: url(<?php echo URL; ?>Ambula/public/img/valid.png) center center no-repeat;
			display: inline-block;
			text-indent: -9999px;
		}

		label.error {
			font-weight: bold;
			color: red;
			padding: 2px 8px;
			margin-top: 2px;
		}
	</style>
</head>

<body id="registration">

<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>

	<div class="container">
		<div class="col-lg-6 registration-container">
			<div class="alert alert-success" role="alert" style='text-align:center;>Your Promotional Information Was Successfully Added
			</div>
		</div>
	</div>
</body>
</html>

