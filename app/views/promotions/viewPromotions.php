<?php
/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 8/18/2015
 * Time: 3:11 AM
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
	<meta charset="utf-8">
	<title>The Ambula</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="../public/css/bootstrap.css" rel="stylesheet" media="screen"/>
	<link href="../public/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
	<link href="../public/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"/>
	<link href="../public/css/custom.css" rel="stylesheet" media="screen"/>


	<script type="text/javascript" src="../public/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../public/js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../public/js/jquery.min.js"></script>


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
		var onResize = function() {
			// apply dynamic padding at the top of the body according to the fixed navbar height
			$("#promonav").css("margin-top", $(".navbar-fixed-top").height());
		};

		// attach the function to the window resize event
		$(window).resize(onResize);

		// call it also when the page is ready after load or reload
		$(document).ready(function() {
			$(".promoType").click(function (e) {
				var type = $(this).attr('id');
				$.ajax({
					url:  "/Ambula/Promotion/viewAllPromotions",
					type: "GET",
					data: {promtoionType: type},
					dataType: "html",
					success: function (response) {
						$("#promotionContainer").html(response);
					}
				});
			});
		});

		$(document).ready(function () {
			var type = 'restaurant';
			$.ajax({
				url:  "/Ambula/Promotion/viewAllPromotions",
				type: "GET",
				data: {promtoionType: type},
				dataType: "html",
				success: function (response) {
					$("#promotionContainer").html(response);
				}
			});
		});


	</script>

	<style>
		.navbar-promo{
			background: rgb(255, 255, 255); /* for IE */
			/* Rounded Corners */
			border-radius: 5px;
			border: 1px solid #E0D6CC;
			margin-right: 7.55%;
			margin-left: 7.55%;
			margin-top: 53px;
		}

		label.valid {
			width: 24px;
			height: 24px;
			background: url(<?php echo URL; ?>../public/img/valid.png) center center no-repeat;
			display: inline-block;
			text-indent: -9999px;
		}

		label.error {
			font-weight: bold;
			color: red;
			padding: 2px 8px;
			margin-top: 2px;
		}

		#promotionContainer{
			margin: 20px;
		}

		.promoViewButton{
		}

		.modal {
			background: rgba(000, 000, 000, 0.7);
			min-height:1000000px;
		}

		.modal-dialog-center {
			margin-top: 15%;
		}

	</style>
</head>

<!--Header START -->
<body>
	<?php $this->view('_template/navigation_menu', "viewPromotion") ?>

	<nav class="navbar navbar-default navbar-promo" id="promonav">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php if(isset($_SESSION["user_logged_in"]) && $_SESSION["user_account_type"] == 2){ ?>
					<a class="navbar-brand" href="/Ambula/Promotion/index" style="float: left">Add New Promotions</a>
				<?php }else{ ?>
					<a class="navbar-brand" href="#" style="float: left" data-toggle="modal" data-target="#myModal">Join Ambula Promotions</a>
				<?php }?>

			</div>
			<!-------------------- Modal --------------------->

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style=" overflow: scroll; height:auto;" data-backdrop="false">
				<div class="modal-dialog modal-dialog-center">
					<div class="modal-content">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Sign Up as a Coporate User</h4>
						</div>
						<div class="modal-body">
							<div class="alert alert-info">
								You must be signed in as an Ambula&trade; coporate user to add new Promotions to Ambula&trade; promotions.
								Sign Up here as a Coporate User
							</div>
							<a href="/Ambula/registration/regNewCommercialUser/" class="btn btn-primary" role="button" style="margin-left:35%; margin-right: 35%">Join Ambula Promotions</a>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>


			<!-- Collect the nav links, forms, and other content for toggling -->

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav nav-pills nav-justified">
					<li role="presentation" class="active"><a id="restaurant" class="promoType" href="#">Restaurents</a></li>
					<li role="presentation" ><a id="foodproduct" class="promoType"href="#">All You can eat</a></li>
					<li role="presentation" ><a id="culinary_equipment" class="promoType"href="#">Best Cook wear deals</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->

		</div><!-- /.container-fluid -->
	</nav>

	<div id="promotionContainer">

	</div>
</body>
</html>

