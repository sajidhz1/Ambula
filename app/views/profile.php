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
    <link href="=../public/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../public/css/slider.css">

    <!-- fav icon -->
    <link rel="icon" href="../public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="../public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="../public/js/jquery.leanModal.min.js"></script>
    
    <script type="text/javascript" src="../public/js/typeahead.js"></script>

    <link type="text/css" rel="stylesheet" href="../public/css/style.css"/>

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


</head>

<body>
<!--Header START -->
<style>
    /* Profile sidebar */
    .profile-sidebar {
        padding: 20px 0 10px 0;
        background: #fff;
    }

    .profile-userpic img {
        float: none;
        margin: 0 auto;
        width: 50%;
        height: 50%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }

    .profile-usertitle {
        text-align: center;
        margin-top: 20px;
    }

    .profile-usertitle-name {
        color: #5a7391;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .profile-usertitle-job {
       
        color: #5b9bd1;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 15px;
    }

    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }

    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }

    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }

    .profile-usermenu {
        margin-top: 30px;
    }

    .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
    }

    .profile-usermenu ul li:last-child {
        border-bottom: none;
    }

    .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
    }

    .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
    }

    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
    }

    .profile-usermenu ul li.active {
        border-bottom: none;
    }

    .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
    }

    /* Profile Content */
    .profile-content {
        padding: 20px;
        background: #fff;
        min-height: 460px;
    }
    .profile-recipe-tile{
        padding: 5px;
        border: 1px solid #B2B2B2;
        /* Rounded Corners */
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        margin-right: 15px;
        margin-bottom: 15px;
        text-align: center;
    }
     .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        background: red;
        cursor: inherit;
        display: block;
    }

</style>
<?php $this->view('_template/navigation_menu',"newRecipe") ?>
<div class="container" style="margin-top: 60px;">
    <div class="row profile">
        <div class="col-md-3">
             <div class="profile-sidebar">
                <?php
                 $result =  json_decode($this->getUser(),true);

                ?>
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <?php if($result[0]['user_provider_type'] == 'FACEBOOK')  {?>
                    <img src="https://graph.facebook.com/<?=$result[0]['user_facebook_uid']?>/picture?type=large" class="img-responsive" alt="">
                    <?php } else if($result[0]['user_avatar']==1){ ?>
                    <img src="http://localhost/Ambula/uploads/profile/<?=$result[0]['user_name'] ?>.jpg" class="img-responsive" alt="">
                    <?php } else {  ?>
                    <img src="http://localhost/Ambula/public/img/profile_avatar.jpg" class="img-responsive" alt="">
                    <?php } ?>
                     <?php
                     if(isset($_SESSION['uid']))
                     if( $_SESSION['uid'] == $_GET['id']){ ?>
                        <form   role="form" method="POST" enctype="multipart/form-data" action="uploadUserPhoto"
                               id="formphoto">
                            <span class="file-input btn btn-default btn-file glyphicon glyphicon-edit" style="position:absolute;top:0;right: 0;">
                            <input  id="input-2" type="file" name="profile" class="btn btn-success"  data-show-upload="false" multiple>
                            </span>
                        </form>
                       

                    <?php }  ?>
                    
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php if($result[0]['user_provider_type'] == "FACEBOOK") {
                            echo $result[0]['user_name'];
                        }else{
                            echo $result[1]['first_name'].' '.$result[1]['last_name'];
                        }
                        ?>
                    </div>
                    <div class="profile-usertitle-job">
                        <span id="desc-val"><?php if($result[1]['description'] ==  null) echo "Short Description";
                         else
                             echo $result[1]['description'];
                        ?></span>
                        <?php
                     if(isset($_SESSION['uid']))
                     if( $_SESSION['uid'] == $_GET['id']){ ?>
                         <button style="color: #343434;margin-left: 5px;" class="btn btn-default glyphicon glyphicon-edit" id="description-edit"></button>
			<?php } ?>
                        <div class="controls" id="description-edit-box"  style="margin-top: 8px;background: #e1e1e1;padding: 4px;display: none;">
                            <textarea class="form-control" id="description" placeholder="description"></textarea>
                            <button class="btn btn-success glyphicon glyphicon-ok" id="description-edit-save"></button>
                            <button class="btn btn-danger glyphicon glyphicon-remove" id="description-edit-close"></button>
                        </div>
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Follow</button>
                    <button type="button" class="btn btn-danger btn-sm">Message</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                
            </div>
        </div>
        <div class="col-sm-12 col-md-9">
            <div class="profile-content">
            <?php $arrrecipe = json_decode($this->getRecipesByUser($_GET['id']), true);
              foreach ($arrrecipe as $recipe) {
                ?>
                  <div class="col-sm-6 col-md-3 profile-recipe-tile" style="margin: 3px; ">
                      <h4 style="color: #8F0000"><a href="http://localhost/Ambula/recipes/viewRecipe/<?=$recipe['idRecipe']; ?>" ><?=$recipe['title']; ?></a></h4>
                      <img src="http://localhost/Ambula/uploads/<?=$recipe['idRecipe']; ?>/thumb.jpg" width="175" height="120">
                  </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<!-- Java Scripts Codes-->
<script>
    $(document).ready(function (e) {
        $('#formphoto').on('submit',(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                type:'POST',
                url: 'http://localhost/Ambula/home/uploadUserPhoto?username=<?=$result[0]['user_name'] ?>&user_id=<?=$result[0]['user_id'] ?>',
                data:formData,
                contentType: false,
                processData: false,
                success:function(data){
                   $('#input-2').hide();


                },
                error: function(data){
                    console.log("error");
                    console.log(data);
                }
            });
        }));

         $('#description-edit-save').on('click',(function(e) {

            $.ajax({
                type:'POST',
                url: 'http://localhost/Ambula/home/addUserDescription',
                data:{uid:<?php echo $_GET['id'];?>, val: $('#description').val() },
                success:function(data){
                    $('#desc-val').text($('#description').val());
                     $('#description-edit-box').hide();
                },
                error: function(data){
                    console.log("error");
                    console.log(data);
                }
            });
        }));


        $("#input-2").on("change", function() {
            $('.img-responsive')[0].src = window.URL.createObjectURL(this.files[0])
            $("#formphoto").submit();
        });

        $("#description-edit").on("click", function() {
           $('#description-edit-box').show();
        });

        $("#description-edit-close").on("click", function() {
            $('#description-edit-box').hide();
        });
    });
</script>


<script src="../../public/js/bootstrap.min.js"></script>



<script src="../../public/js/script.js"></script>



</body>

</html>