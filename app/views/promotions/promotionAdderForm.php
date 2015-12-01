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
		<form data-toggle="validator" role="form" action='/Ambula/Promotion/addPromotionAdder' method="POST">

			<div class="alert alert-warning" role="alert">You Haven't Been Registered With Us Before, So Tell Us Something About Your Self</div>
			<div class="row">
				<div class="form-group col-lg-6">
					<!-- FirstName -->
					<label class="control-label" for="first_name">First Name</label>

					<div class="controls">
						<input type="text" id="firstname" name="first_name" placeholder=""
							   class="form-control" required>
					</div>
					<span class="help-block with-errors"></span>
				</div>
				<div class="form-group col-lg-6">
					<!-- LastName -->
					<label class="control-label" for="last_name">Last Name</label>

					<div class="controls">
						<input type="text" id="lastname" name="last_name" placeholder=""
							   class="form-control" required>
						<span class="help-block with-errors"></span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-6">
					<!-- Company -->
					<label class="control-label" for="company">Company Name</label>

					<div class="controls">
						<input type="text" id="company" name="company" placeholder=""
							 class="form-control" required>
						<span class="help-block with-errors"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-8">
					<!-- E-mail -->
					<label class="control-label" for="email">E-mail</label>

					<div class="controls">
						<input type="email" id="email" name="email" placeholder="" class="form-control"
							   data-error="Invalid email format" required>
						<span class="help-block with-errors"></span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-6">
					<div class="controls">
						<!-- Phone Number -->
						<label class="control-label" for="phone_number">Contact Number</label>
						<input type="text" id="phone_number" name="phone_number" placeholer="" class="form-control"
							   data-error="Enter a valid phone number" required>
						<p class="help-block with-errors"></p>
					</div>
				</div>
			</div>
			<div class="form-group">
				<!-- Button -->
				<div class="controls">
					<button class="btn btn-success">Continue</button>
				</div>
			</div>
		</form>

	</div>
	<div class="col-lg-6">

	</div>
</div>
</body>
</html>
