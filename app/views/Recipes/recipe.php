<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?=$this->recipes->recipename; ?></title>
    	<meta property="og:image"              content="http://theambula.lk/uploads/<?=$this->recipes->recipeId; ?>/facebook.jpg" />
	<meta property="og:url"                content="http://theambula.lk/recipes/viewRecipe/<?=$this->recipes->recipeId; ?>" />
	<meta property="og:type"               content="article" />
	<meta property="og:title"              content="<?php echo $this->recipes->recipename; ?>" />
	
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="http://localhost/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link rel="stylesheet" href="http://localhost/Ambula/public/css/blueimp-gallery.min.css">
    <link href="http://localhost/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/recipes-style.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/bootstrap-image-gallery.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/star-rating.min.css" rel="stylesheet" media="screen"/>

    <!-- fav icon -->
    <link rel="icon" href="http://localhost/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">

    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.11.0.min.js"></script>

    <script src="http://localhost/Ambula/public/js/bootstrap.min.js"></script>
    <script src="http://localhost/Ambula/public/js/recipes/jquery.blueimp-gallery.min.js"></script>
     <script src="http://localhost/Ambula/public/js/recipes/star-rating.min.js"></script>
    <script src="http://localhost/Ambula/public/js/bootstrap-image-gallery.min.js"></script>
    
   
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

    <script>
        $(document).on('click', '#btn-collapse', function (e) {
            e.preventDefault();
            $("html, body").animate({ scrollTop: 400 }, 500);
        });

    </script>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=753864634705819";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div class="container-fluid pages">
   
    <div class="row" >
        <div class="col-lg-12 col-md-12 col-sm-12">

            <?php $arr = json_decode($this->getRecipeImages($this->recipes->recipeId), true);
            ?>

            <div id="links" class="col-xs-12 col-md-4 col-lg-4 hgt275">
                <h3>Gallery</h3>

                <div>
                    <?php
                    foreach ($arr as $img) {
                        if (file_exists($img['image_url'])) {
                            ?>

                            <a href="http://localhost/Ambula/<?= $img['image_url']; ?>" title="<?php echo $this->recipes->recipename; ?>" data-gallery=""
                               style="padding: 5px;"><img
                                    src="http://localhost/Ambula/<?= $img['image_url']; ?>" height="100" width="100"/></a>

                        <?php
                        } else {
                        }
                    } ?>
                </div>

            </div>
            <div class="col-xs-12 col-md-5 col-lg-5 recipe-details hgt275" >
                <h1 class="recipe-title"><span><?php echo $this->recipes->recipename; ?></span></h1>

                <div class="row">
                    <span class="recipe-tags">Tags : <?= $this->recipes->tag; ?></span>
                </div>
                <div class="row">
                    <div class="recipe-time col-lg-5" ><h3 class="time">Ready in</h3><br>

                        <h4 class="time"><?php $time = explode(":", $this->recipes->time); ?><?php if(intval($time[0]) !=0 ) echo $time[0]." Hours<br>"; ?>  <?php if(intval($time[1]) !=0 ) echo $time[1]."  minutes" ?></h4>
                        </div>

               <!--     <div class="recipe-icons">
                        <img src="/public/img/oven.png" class="mrg5R" width="30" height="30">
                        <img src="/public/img/vege.png" width="30" height="30">
                        <img src="/public/img/cold.png" width="30" height="30">
                        <img src="/public/img/oven.png" width="30" height="30">
                    </div> -->
                    <?php if($this->checkRecipe_si($this->recipes->recipeId) == 1){ ?>
                    <a href="/recipes/viewRecipe_si?r=<?=$this->recipes->recipeId; ?>"  style=" margin-top:5px;font-weight: bolder;" class="btn btn-danger" >රෙසිපිය සිංහලෙන්</a>
                    <?php } ?>
		    <br>                 
		    <input id="input-2c" class="rating" min="0" max="5" step="0.1" value="<?=$this->recipes->ratings; ?>" data-size="xs"
                            data-show-caption="false" data-glyphicon="false" value="0" data-rating-class="rating-fa">
  
		    
		    <div class="fb-share-button" style="margin:10px;" data-href="http://theambula.lk/recipes/viewRecipe/<?=$this->recipes->recipeId; ?>" data-layout="button"></div>
                    <a class="twitter-share-button" href="https://twitter.com/share"
                       data-related="twitterdev"
                       data-size="large"
                       data-count="none"></a>

                    <?php $result = $this->getRecipeAddedBy($this->recipes->recipeId);
                       if(Session::get('uid') == $result->users_user_id){
                    ?>
                                                    
                         <a href="/recipes/updateRecipe?id=<?=$this->recipes->recipeId; ?>" class="btn btn-default" >Update Recipe</a>
                    <?php } else{ ?>
                     <span style="color:brown;float: left; position: absolute;bottom:8px;left:8px;"><?=$this->recipes->view; ?><i>views</i> <i class="glyphicon glyphicon-eye-open"></i></span>

                        <p id="recipe-user"><i>Recipe by</i>
                        <a  href="/home/profile?id=<?=$result->users_user_id; ?>"><?php echo $result->first_name; ?></a></p>
                    <?php } ?>
                </div>
            </div>

            <div class="col-lg-2 col-md-2 ad-space"><img style="height: 275px;width: 200px;" src="<?php echo URL; ?>/public/img/marina.jpg"></div>

        </div>

        <div class="row"></div>
        <div class="col-lg-9 col-md-9 ingredients-container" >
            <h3>Ingredients</h3>
            <ul class="list-inline col-lg-12 ingredients">
                <?php $arrsub = json_decode($this->getRecipeIngredients($this->recipes->recipeId), true);

                foreach ($arrsub as $ingredient) {
                    ?>
                    <li class="list-group-item"><a href="#" title ="<?php echo $ingredient['ing_si']; ?>" style="font-size: 0.9em;" ><?php echo $ingredient['title']; ?> </a><span style="margin-left: 5px;"
                            class="badge"><?php echo " ".$ingredient['qty'] . " " . $ingredient['units']; ?></span></li>
                <?php } ?>
            </ul>
            <a type="button" class="btn btn-info" id="btn-collapse" data-toggle="collapse"
               data-target="#procedure-container"  onclick="document.body.style.overflowY = 'scroll';" >View Directions</a>
               
               
        </div>
        <div class="col-lg-3 col-md-3 ad-space"><img style="width: 250px;margin-top: 3px;" src="<?php echo URL; ?>/public/img/turkey.jpg"></div>
        </div>

    </div>


    <div class="row" style="margin-top: 10px;">
        <div class="collapse col-lg-9" id="procedure-container">
            <?php $arrdesc = json_decode($this->getRecipeDescription($this->recipes->recipeId), true);
            $i = 0;
            foreach ($arrdesc as $description) {
                ++$i;
                ?>
                <div class="col-lg-12 col-md-12 recipe-procedure"><h5>Step <?= $i ?>.</h5>
                    <p><?= $description['description_en'] ?></p>
                    <?php if(file_exists($description['image_url'])) { ?>
                    <a href="/<?= $description['image_url']; ?>" data-gallery="" style="position: relative;right: 5px;margin:10px;color: #902333">view image</a>
                    <?php } ?>		
                </div>

            <?php } ?>
        </div>
        
         <div class="col-lg-9" id="comment-box">
            <div class="detailBox">
                <div class="commentBox">

                    <p class="taskDescription">Join the Discussion</p>
                </div>
                <div class="actionBox">
                    <ul class="commentList">
                        <?php $comments = json_decode($this->getUserComments($this->recipes->recipeId), true);
                        foreach ($comments as $comment) {
                        ?>

                        <li>
                            <div class="commenterImage">
                                <img src="http://lorempixel.com/50/50/people/6" />
                            </div>
                            <div class="commentText">
                                <p class=""><?=$comment['text'] ?></p> <span class="date sub-text"><?=$comment['date'] ?></span>

                            </div>
                        </li>
                        <?php  } ?>
                    </ul>
                    <form class="form-inline" role="form" method="post" id="comment-form" >
                        <div class="form-group">
                            <input class="form-control" name="text" id="comment" type="text" placeholder="Your comments" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3">

        </div>
    </div>
</div>

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '#btn-collapse', function (e) {
        e.preventDefault();
        $("html, body").animate({ scrollTop: 400 }, 500);
    });

    
    $(document).on('submit', '#comment-form', function (e) {
        e.preventDefault();

        <?php if(isset($_SESSION['uid']))  {?>
        $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
            type: 'POST',
            data: {text: $('#comment').val()},
            url: '/Ambula/recipes/addComment/<?=$this->recipes->recipeId ?>',
            success: function (responseText) {
              
                $('.commentList').append(' <li><div class="commenterImage"><img src="http://lorempixel.com/50/50/people/6" /></div>'
                +'<div class="commentText"><p class="">'+$('#comment').val()+
               '</p> <span class="date sub-text">'+ new Date($.now()) +'</span></div></li>');


                $('#comment').val('') ;
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

