<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="http://localhost/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>

    <!-- fav icon -->
    <link rel="icon" href="http://localhost/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">

    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/typeahead.js"></script>



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

        .product-brand{
            float: none;
            margin: 0 auto;

            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important;
        }

        .box {
            padding: 5px;
            text-align: centetext-align: center;r;


        }

        .box .inner {
            border: 1px solid #B2B2B2;
            background-color: #eee;
            height: 225px;
            display: block;

        }

        .ad{
            padding: 10px;
            text-align: center;}



        .product_thumb{
            position: relative;

        }
        header.carousel {
            height: 50%;
        }

        header.carousel .item,
        header.carousel .item.active,
        header.carousel .carousel-inner {
            height: 100%;
        }

        header.carousel .fill {
            width: 100%;
            height: 100%;
            background-position: center;
            background-size: cover;
        }

        /* list style*/
        #similar_products {
            list-style-type: none;
            padding-left:0;
        }

        #similar_products li img {
            float: left;
            margin: 0 5px 0 0;
        }

        #similar_products li p {

            font: 200 12px/1.5 Georgia, Times New Roman, serif;
        }

        #similar_products li {
            padding: 10px;
            overflow: auto;
        }

        #similar_products li:hover {
            background: #eee;
            cursor: pointer;
        }

        .detailBox {

            margin-bottom: 20px;
            padding: 10px;

        }
        .titleBox {
            background-color:#fdfdfd;
            padding:10px;
        }
        .titleBox label{
            color:#444;
            margin:0;
            display:inline-block;
        }

        .commentBox {
            padding:10px;
            border-top:1px dotted #bbb;
        }
        .commentBox .form-group:first-child, .actionBox .form-group:first-child {
            width:80%;
        }
        .commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
            width:18%;
        }

        .actionBox .form-group * {
            width:100%;
        }
        .taskDescription {
            margin-top:10px 0;
        }
        .commentList {
            padding:0;
            list-style:none;
            max-height:150px;
            overflow:auto;
        }
        .commentList li {
            margin:0;
            margin-top:10px;
            padding: 5px;

        }
        .commentList li > div {
            display:table-cell;
        }
        .commenterImage {
            width:30px;
            margin-right:5px;
            height:100%;
            float:left;
        }
        .commenterImage img {
            width:100%;
            border-radius:50%;
        }
        .commentText p {
            margin:0;
            color: #222;
        }

        .date{
            color: #902333;
            font-size: 0.8em;
        }

		[data-link] {
			cursor: pointer;
		}

    </style>

	<script>
		$(document).ready(function() {
			$("[data-link]").click(function() {
				window.location.href = $(this).attr("data-link");
				return false;
			});
		});
	</script>

</head>

<body>

<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>

<div class="container-fluid" style="margin-top: 60px;" >
    <div class="col-lg-7 hgt600" style="">
     <div style="height: 350px;background: #e5e5e5;border-bottom: 1px solid black;">
         <?php $product = json_decode($this->viewSingleProduct(), true); ?>
         <img src="/Ambula/<?=$product[0]['img_url'] ?>"  height="175" width="175" style="margin-top: 20px;margin-left: 20px;" alt=""/>
         <h4 class="pg-title txt-red" style="display: inline-block;vertical-align: top;margin-left: 20px;"><span><?=$product[0]['product_name'] ?></span></h4>
         <p style="font-size: 14px;margin: 8px;color: #222"><?=$product[0]['description'] ?></p>

     </div>
     <div>
         <div  id="comment-box">
             <div class="detailBox">
                 <div class="commentBox">

                     <p class="taskDescription">Join the Discussion</p>
                 </div>
                 <div class="actionBox">
                     <ul class="commentList">

                             <li>
                                 <div class="commenterImage">
                                     <img src="http://lorempixel.com/50/50/people/6" />
                                 </div>
                                 <div class="commentText">
                                     <p class="">abkjcbskjvs kdjvkjsvdb</p> <span class="date sub-text">25-12-2015</span>
                                    </div>
                             </li>
                         <li>
                             <div class="commenterImage">
                                 <img src="http://lorempixel.com/50/50/people/6" />
                             </div>
                             <div class="commentText">
                                 <p class="">abkjcbskjvs kdjvkjsvdb</p> <span class="date sub-text">25-12-2015</span>
                             </div>
                         </li>
                         <li>
                             <div class="commenterImage">
                                 <img src="http://lorempixel.com/50/50/people/6" />
                             </div>
                             <div class="commentText">
                                 <p class="" >abkjcbskjvs kdjvkjsvdb</p> <span class="date sub-text">25-12-2015</span>
                             </div>
                         </li>
                         <li>
                             <div class="commenterImage">
                                 <img src="http://lorempixel.com/50/50/people/6" />
                             </div>
                             <div class="commentText">
                                 <p class="" >abkjcbskjvs kdjvkjsvdb</p> <span class="date sub-text">25-12-2015</span>
                             </div>
                         </li>

                     </ul>
                     <form class="form-inline" role="form" method="post" id="comment-form" >
                         <div class="form-group">
                             <input class="form-control" name="text" id="comment" type="text" placeholder="Your Review" />
                         </div>
                         <div class="form-group">
                             <button class="btn btn-default">Add</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
    </div>
    <div class="col-lg-3 hgt600" >
        <h4 style="text-align: center">Similar Products</h4>
        <ul id="similar_products">
			<?php $simiProducts = json_decode($this->similarProductsToSingleProduct(),true);
			foreach ($simiProducts as $smProduct){?>

				<li data-link="/Ambula/FoodProducts/product?productId=<?=$smProduct['idproducts']?>" >

					<img src="/Ambula/<?=$smProduct['img_url']?>" height="100" width="100" style="margin-top: 20px;margin-left: 20px;" alt="" class="product_thumb" >
					<h4><?= $smProduct['product_name']?></h4>
					<p><?= $smProduct['description']?></p>
				</li>
			<?php }?>
        </ul>
    </div>
    <div class="col-lg-2 hgt600 ad">
    <div  style="background: #999;height: 300px;"></div>
    <div  style="background: #999;height: 300px;margin-top: 15px;"></div>
    </div>
   <div class="col-lg-6" style="margin-top: 50px;">
      <h4> More Products from Kist</h4>
	   <?php
		$sameProducts = json_decode($this->singleProductsOwnersOtherProducts(),true);
		foreach ($sameProducts as $ownerProduct){ ?>
       <div class="col-lg-4 box" style="height: 265px;margin: auto;" data-link="/Ambula/FoodProducts/product?productId=<?=$ownerProduct['idproducts']?>">

           <a class="inner box"  >

               <h5 style="color: #333333;height: 65px;"><?= $ownerProduct['product_name']?></h5>
               <img class="product_thumb" src="/Ambula/<?=$ownerProduct['img_url'] ?>"
                    style="display:block;margin: auto;width: 100%;height: 130px;">
           </a>
       </div>
	   <?php } ?>
   </div>

    <div class="col-lg-6" style="margin-top: 50px;">
        <h4> Related Recipes</h4>
        <div class="col-lg-4 box" style="height: 265px;margin: auto;">
            <a class="inner box" >
                <h5 style="color: #333333;height: 65px;">Kist Strawberry Jam</h5>
                <img class="product_thumb" src="/Ambula/public/img/no_preview_available.jpg"
                     style="display:block;margin: auto;width: 100%;height: 130px;">
            </a>
        </div>
    </div>
</div>

</body>
</html>