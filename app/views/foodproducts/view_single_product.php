<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>The Ambula</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="http://localhost/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
<link href="http://localhost/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
<link href="http://localhost/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
<link href="http://localhost/Ambula/public/css/star-rating.min.css" rel="stylesheet" media="screen"/>


<!-- fav icon -->
<link rel="icon" href="http://localhost/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">

<script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://localhost/Ambula/public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://localhost/Ambula/public/js/typeahead.js"></script>
<script type="text/javascript" src="http://localhost/Ambula/public/js/recipes/star-rating.min.js"></script>


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

.product-brand {
    float: none;
    margin: 0 auto;

    -webkit-border-radius: 50% !important;
    -moz-border-radius: 50% !important;
    border-radius: 50% !important;
}

.box {
    padding: 5px;
    text-align: centetext-align: center;
    r;

}

.box .inner {
    border: 1px solid #B2B2B2;
    background-color: #eee;
    height: 225px;
    display: block;

}

.ad {
    padding: 10px;
    text-align: center;
}

.product_thumb {
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
    padding: 0px;
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

.titleBox label {
    color: #444;
    margin: 0;
    display: inline-block;
}

.reviewBox {
    padding: 10px;
    border-top: 1px dotted #bbb;
}

.reviewBox .form-group:first-child, .actionBox .form-group:first-child {
    width: 80%;
}

.reviewBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
    width: 18%;
}

.actionBox .form-group * {
    width: 100%;
}

.commentList {
    padding: 0;
    list-style: none;
    max-height: 150px;
    overflow: auto;
}

.commentList li {
    margin: 0;
    margin-top: 10px;
    padding: 5px;

}

.commentList li > div {
    display: table-cell;
}

.commenterImage {
    width: 30px;
    margin-right: 5px;
    height: 100%;
    float: left;
}

.commenterImage img {
    width: 100%;
    border-radius: 50%;
}

.commentText p {
    margin: 0;
    color: #222;
}

.date {
    color: #902333;
    font-size: 0.8em;
}

[data-link] {
    cursor: pointer;
}

#addReviewButton, #moreReviewButton {
    float: right;
}

.modal {
    background: rgba(000, 000, 000, 0.7);
    min-height: 1000000px;
}

.modal-dialog-center {
    margin-top: 10%;
}

.modal-body {
    height: 50vh;
}

.modal .modal-dialog {
    width: 45%;
}

.modal-header {
    height: 85px;
    background: #e78f08;
    color: white;
}

.modal-footer {
    border-top: none;
}

.reviewDesc {
    background: #f2f2f2;
    resize: none;
    border-radius: 0px;
}

.commenterImage {
    width: 65px;
    height: 65px;
}

div.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.row2 {
    padding: 5px;
}

.moreAndRelRecipes {
    margin-top: 40px;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: 2px;
    margin-left: 2px;
    margin-bottom: 15px;
}

.thumbnail {
    margin-bottom: 0px;
}

#input-2c {
    cursor: none;
}

.btn {
    border-radius: 0px;
}

div.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

</style>

<script>
    $(document).ready(function () {
        $("[data-link]").click(function () {
            window.location.href = $(this).attr("data-link");
            return false;
        });
    });
</script>

</head>

<body>
<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>
<?php Session::set('productId', $_GET['productId']) ?>

<div class="container-fluid" style="margin-top: 60px;">

<div class="row productWithSimProds">

<div class="col-lg-7" style="padding-left: 30px; height: 700px">

    <div class="row card">
        <div class="col-lg-12" style="height: 350px; background:#f6f6f6">
            <?php $product = json_decode($this->viewSingleProduct(), true); ?>
            <img src="/Ambula/<?= $product[0]['img_url'] ?>" height="175" width="175"
                 style="margin-top: 20px;margin-left: 20px;" alt=""/>
            <h4 class="pg-title txt-red" style="display: inline-block;vertical-align: top;margin-left: 20px;">
                <span><?= $product[0]['product_name'] ?></span></h4>

            <p style="font-size: 14px;margin: 8px;color: #222"><?= $product[0]['description'] ?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 reviewBox">
            <span class="taskDescription">REVIEWS</span>
            <?php
            $userReview = $this->checkUserReviewAvailability();
            if (isset($_SESSION["user_logged_in"]) && $userReview) {
                ?>
                <button type="button" id="addReviewButton" class="btn btn-default" data-toggle="modal"
                        data-target="#editModal">
                    <span class="glyphicon glyphicon-pencil"></span> Edit you'r Review
                </button>
            <?php } elseif (isset($_SESSION["user_logged_in"]) && !$userReview) { ?>
                <button type="button" id="addReviewButton" class="btn btn-default" data-toggle="modal"
                        data-target="#writeModal">
                    <span class="glyphicon glyphicon-pencil"></span> Write a Review
                </button>
            <?php } else { ?>
                <button type="button" id="addReviewButton" class="btn btn-default" data-toggle="modal"
                        data-target="#loginModal">
                    <span class="glyphicon glyphicon-pencil"></span> Login to Write a Review
                </button>
            <?php } ?>
        </div>
    </div>

    <div class="row card">
        <div class="col-lg-12" style="height : 290px; padding: 10px; display: inline-block; overflow: auto">

            <ul id="similar_products">
                <?php $reviews = json_decode($this->viewReviewForSingleProduct(), true);
                foreach ($reviews as $review) {
                    ?>
                    <li style="cursor: default;">
                        <div class="col-xs-1">
                            <img class="img-circle commenterImage"
                                 src="/Ambula/<?= $review['user_avatar'] ?>/<?= $review['user_name'] ?>.jpg"
                                 style="width: 45px; height: 45px">
                        </div>
                        <div class="col-xs-11">
                            <span style="margin-right: 10px; color: #2682bf "><?= $review['user_name'] ?>
                                : </span><span><?= date('M j Y g:i A', strtotime($review['timeAdded'])) ?></span>
                            <input id="input-2c" name="ratingStrShow" class="rating" min="0" max="5" step="0.1"
                                   value="<?= $review['rating'] ?>" data-size="xxs" data-show-caption="false"
                                   data-glyphicon="false"
                                   value="" data-rating-class="rating-fa" readonly>

                            <p style="font-size:medium"><?= $review['review'] ?></p>
                        </div>
                    </li>
                <?php } ?>
            </ul>

        </div>
        <!--<button type="button" id="moreReviewButton" class="btn btn-default" style="margin-right: 15px">
            <span class="glyphicon glyphicon-pencil"></span> More Reviews
        </button> -->
    </div>

</div>

<!-------------------- Modal for write review --------------------->

<div class="modal fade" id="writeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="false" style=" overflow: scroll; height:auto;" data-backdrop="false">
    <div class="modal-dialog modal-dialog-center">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <img class="img-circle commenterImage" src="<?= Session::get('user_avatar_url') ?>"/>
                <h4 class="modal-title" id="myModalLabel" style="color: white; margin: 2%">Review
                    by <?= Session::get('name') ?></h4>
            </div>
            <form role="form" method="POST" enctype="multipart/form-data" action="addProductReview">
                <div class="modal-body">
                    <div class="col-lg-4" style="border: none; height: 100%;">
                        <img class="img-thumbnail" src="/Ambula/<?= $product[0]['img_url'] ?>"/>

                        <p class="pg-title txt-red"
                           style="display: inline-block;vertical-align: top;margin-left: 20px;">
                            <span><?= $product[0]['product_name'] ?></span></p>
                    </div>

                    <div class="col-lg-8" style="border: none; height: 100%;">
                        <div class="form-group">
                            <textarea class="form-control reviewDesc" rows="13" name="reviewTxt"></textarea>
                        </div>
                        <input id="inputStar" name="ratingStr" class="rating" min="0" max="5" step="0.1"
                               value="" data-size="xs" data-show-caption="true" data-glyphicon="false"
                               value="0" data-rating-class="rating-fa">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" style="width: 70px">Close
                    </button>
                    <button type="submit" class="btn btn-primary" onClick="window.location.reload()">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-------------------- Modal for informing to login to write a review --------------------->

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="false" style=" overflow: scroll; height:auto;" data-backdrop="false">
    <div class="row modal-dialog modal-dialog-center">
        <div class="modal-content col-xs-12">
            <div class="row modal-header">
                <div class="col-xs-12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <img class="img-circle commenterImage" src="/Ambula/public/img/profile_avatar.jpg"/>
                    <h4 class="modal-title" id="myModalLabel" style="color: white; margin: 2%">First Login
                        To
                        Add a Product Review</h4>
                </div>

            </div>
            <div class="row modal-body">
                <div class="col-xs-4" style="border: none; height: 100%;">
                    <img class="img-thumbnail" src="/Ambula/<?= $product[0]['img_url'] ?>"/>

                    <p class="pg-title txt-red"
                       style="display: inline-block;vertical-align: top;margin-left: 20px;">
                        <span><?= $product[0]['product_name'] ?></span></p>
                </div>
                <div class="col-xs-8" style="border: none; height: 100%;">
                    <div class="alert alert-info">
                        You must be Signed In in as an Ambula&trade; user to add a review about this
                        product.
                        Sign In here
                    </div>
                    <a href="/Ambula/login" class="btn btn-primary" role="button"
                       style="margin-left:35%; margin-right: 35%"><i class="glyphicon glyphicon-user"></i>
                        Sign In</a>
                </div>
            </div>
            <div class="row modal-footer">
                <div class="col-xs-12">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" style="width: 70px">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-------------------- Modal for edditing the review if present--------------------->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="false" style=" overflow: scroll; height:auto;" data-backdrop="false">
    <div class="modal-dialog modal-dialog-center">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <img class="img-circle commenterImage" src="<?= Session::get('user_avatar_url') ?>"/>
                <h4 class="modal-title" id="myModalLabel" style="color: white; margin: 2%">Review
                    by <?= Session::get('name') ?></h4>
            </div>
            <?php $userEditReview = json_decode($this->viewReviewFromAUserForProduct(), true); ?>
            <form role="form" method="POST"
                  action="/Ambula/FoodProducts/updateUserReview/<?= $userEditReview[0]['idproduct_review'] ?>">
                <div class="modal-body">
                    <div class="col-lg-4" style="border: none; height: 100%;">
                        <img class="img-thumbnail" src="/Ambula/<?= $product[0]['img_url'] ?>"/>

                        <p class="pg-title txt-red"
                           style="display: inline-block;vertical-align: top;margin-left: 20px;">
                            <span><?= $product[0]['product_name'] ?></span></p>
                    </div>
                    <div class="col-lg-8" style="border: none; height: 100%;">
                        <div class="form-group">
                            <textarea class="form-control reviewDesc" rows="13" id="" name="editReviewTxt"
                                      style="margin-bottom: 5px"><?= $userEditReview[0]['review'] ?></textarea>
                            <input id="inputStar" name="ratingStrEdit" class="rating" min="0" max="5" step="0.1"
                                   value="<?= $userEditReview[0]['rating'] ?>" data-size="xs" data-show-caption="true"
                                   data-glyphicon="false"
                                   value="0" data-rating-class="rating-fa">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" style="width: 70px">Close
                    </button>
                    <button type="submit" class="btn btn-primary" onClick="window.location.reload()">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- similar products div -->
<div class="col-lg-3" style="height: 700px">
    <div class="row card"
         style="margin-left: 5px; margin-right: 0px; display: inline-block; overflow: auto; min-width: 340px; min-height: 695px">
        <h4 style="text-align: center">Similar Products</h4>
        <ul id="similar_products">
            <?php $simiProducts = json_decode($this->similarProductsToSingleProduct(), true);
            foreach ($simiProducts as $smProduct) {
                ?>

                <li data-link="/Ambula/FoodProducts/product?productId=<?= $smProduct['idproducts'] ?>">

                    <img src="/Ambula/<?= $smProduct['img_url'] ?>" height="100" width="100"
                         style="margin-top: 20px;margin-left: 20px;" alt="" class="product_thumb">
                    <h4><?= $smProduct['product_name'] ?></h4>

                    <p><?= $smProduct['description'] ?></p>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>

<div class="col-lg-2 ad" style="margin: 0px; padding: 0px; height: 700px">
    <div class="row card" style="margin: 0px; padding: 0px">
        <div style="background: #999;height: 344px;"></div>

        <div style="background: #999;height: 344px;margin-top: 10px;"></div>
    </div>

</div>

</div>

<div class="row moreAndRelRecipes card">

    <div class="col-lg-6 row2" style="border-right: 1px solid #FF9B33">
        <h4> More Products from Kist</h4>
        <?php
        $sameProducts = json_decode($this->singleProductsOwnersOtherProducts(), true);
        foreach ($sameProducts as $ownerProduct) {
            ?>
            <div class="col-sm-6 col-md-4" style="padding: 5px">
                <div class="thumbnail"
                     data-link="/Ambula/FoodProducts/product?productId=<?= $ownerProduct['idproducts'] ?>">
                    <a class="inner box">
                        <img class="product_thumb" src="/Ambula/<?= $ownerProduct['img_url'] ?>"
                             style="display:block;width: 242px; height: 200px;">

                        <h3 style="color: #333333; width:240px;"><?= $ownerProduct['product_name'] ?></h3>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="col-lg-6 row2" style="">
        <h4> Related Recipes</h4>
        <?php
        $sameProducts = json_decode($this->singleProductsOwnersOtherProducts(), true);
        foreach ($sameProducts as $ownerProduct) {
            ?>
            <div class="col-sm-6 col-md-4" style="padding: 5px">
                <div class="thumbnail"
                     data-link="/Ambula/FoodProducts/product?productId=<?= $ownerProduct['idproducts'] ?>">
                    <a class="inner box">
                        <img class="product_thumb" src="/Ambula/<?= $ownerProduct['img_url'] ?>"
                             style="display:block;width: 242px; height: 200px;">

                        <h3 style="color: #333333; width:240px;"><?= $ownerProduct['product_name'] ?></h3>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>

</div>

</div>

<script>

    $(document).on('submit', '#comment-form', function (e) {
        e.preventDefault();

        <?php if(isset($_SESSION['uid']))  {?>
        $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
            type: 'POST',
            data: {text: $('#comment').val()},
            url: '/Ambula/recipes/addComment/<?=$this->recipes->recipeId ?>',
            success: function (responseText) {

                $('.commentList').append(' <li><div class="commenterImage"><img src="http://lorempixel.com/50/50/people/6" /></div>'
                + '<div class="commentText"><p class="">' + $('#comment').val() +
                '</p> <span class="date sub-text">' + new Date($.now()) + '</span></div></li>');


                $('#comment').val('');
            }
        });

        <?php } else {  ?>
        alert('login to add comment');
        <?php } ?>
    });

    $(document).on('change', '#input-2c', function (e) {
        e.preventDefault();

        <?php if(isset($_SESSION['uid']))  {?>
        $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
            type: 'POST',
            data: {val: $(this).val()},
            url: '/Ambula/recipes/addRating/<?=$this->recipes->recipeId ?>',
            success: function (responseText) {
                // alert(responseText);
            }
        });

        <?php } else {  ?>
        alert('login to add rating');
        <?php } ?>
    });
</script>
</body>

</html>