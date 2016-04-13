<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fav icon -->
    <link rel="icon" href="/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">

    <link href="/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>

    <link href="/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="=/Ambula/public/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="/Ambula/public/css/slider.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/Ambula/public/css/w3.css" rel="stylesheet">

    <!--normal user css file import-->
    <link href="/Ambula/public/css/profile/comm-user-profile.css" rel="stylesheet" media="screen"/>


    <script type="text/javascript" src="/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/typeahead.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/script.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/registration/validator.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/modernizr.js"></script>
    <script type="text/javascript" src="//cdn.ckeditor.com/4.5.3/basic/ckeditor.js"></script>

    <!--normal user js file import-->
    <script type="text/javascript" src="/Ambula/public/js/profile/comm-user-profile.js"></script>


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

        //JS function with ajax call to update the profile pic of the user
        function updateProfilePic() {
            $('#uploadInput').on('change', function (e) {
                var fileform = new FormData();
                fileform.append('upload_input', this.files[0]);
                $('#profilePicture').attr('src', '/Ambula/public/img/loading_image.gif');

                $.ajax({
                    url: '/Ambula/profile/updateProfilePicture',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: fileform,
                    beforeSend: function (status) {
                        console.log(status);
                    },
                    success: function (data) {
                        console.log('success', data);
                        //alert('succ'); //to slow the upload and test loading gif
                        //To reload the uploaded image without reloading the whole page
                        $('#profilePicture').attr('src', '/Ambula/uploads/profile/commercial_user/<?php echo $_SESSION['uid'].'/'.$_SESSION['uid'];?>.card.jpg?' + new Date().getTime());
                    },
                    error: function (exception) {
                        console.log('errord', exception);
                    }
                });
            });
        }

    </script>
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <?php $this->view('_template/navigation_menu', "newRecipe"); ?>
    </div>


    <div id="profileRow" class="row">
        <?php $commUser = json_decode($this->getCooperateUserDetails($this->user_name), true); ?>
        <div class="col-lg-3 col-md-3" style="text-align: center;">
            <div id="effect-1" class="row effects clearfix">
                <div class="profile-userpic col-lg-12 col-md-12 col-sm-12">

                    <?php if ($this->user_name === $_SESSION['username']) { ?>
                        <div class="img">
                            <?php if ($commUser['user_avatar'] == 1) { ?>
                                <img id="profilePicture"
                                     src="/Ambula/uploads/profile/commercial_user/<?= $commUser['user_id'] ?>/<?= $commUser['user_id'] ?>.card.jpg"
                                     class="img-responsive" alt="<?= $commUser['user_name'] ?>">
                            <?php } else { ?>
                                <img id="profilePicture" src="/Ambula/public/img/profile_avatar.jpg"
                                     class="img-responsive"
                                     alt="">
                            <?php } ?>
                            <div class="overlay">
                                <a id="uploadLink" class="expand">
                                    <i class="glyphicon glyphicon-camera" aria-hidden="true"></i>
                                </a>
                                <input type="file" id="uploadInput" name="upload_input"/>
                                <a class="close-overlay hidden">x</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div>
                            <?php if ($commUser['user_avatar'] == 1) { ?>
                                <img id="profilePicture"
                                     src="/Ambula/uploads/profile/commercial/<?= $commUser['user_id'] ?>/<?= $commUser['user_id'] ?>.card.jpg"
                                     class="img-responsive" alt="<?= $commUser['user_name'] ?>">
                            <?php } else { ?>
                                <img id="profilePicture" src="/Ambula/public/img/profile_avatar.jpg"
                                     class="img-responsive"
                                     alt="">
                            <?php } ?>
                            <div class="overlay">
                                <a id="uploadLink" class="expand">
                                    <i class="glyphicon glyphicon-camera" aria-hidden="true"></i>
                                </a>
                                <input type="file" id="uploadInput" name="upload_input"/>
                                <a class="close-overlay hidden">x</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row profile-usertitle">
                <div class="col-lg-12 col-md-12">
                    <span class="profile-usertitle-name" id="profile-usertitle-name">
                        <h3>
                            <?= $commUser['company_name'] ?>
                        </h3>
                    </span>
                </div>
            </div>

            <?php if ($this->user_name === $_SESSION['username']) { ?>
                <div class="row profile-infoview">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a class="w3-btn-block w3-orange" id="viewInfoBtn">View Info</a>
                    </div>
                </div>
            <?php } ?>

            <div class="row profile-usertitle-job">
                <?php $commUserCategories = json_decode($this->getCategoriesByUser($this->user_name), true); ?>
                <div class="col-lg-12">
                    <?php foreach ($commUserCategories as $category) { ?>
                        <span><?= $category['title'] ?></span>
                    <?php } ?>
                </div>
            </div>
            <div class="row profile-weblinks">
                <div class="col-lg-10 col-md-10 col-md-offset-1 col-lg-offset-1">
                    <a id="webLink" class="w3-btn w3-border w3-border-orange w3-hover-white"
                       href="http://<?= $commUser['web_url'] ?>" target="_blank"><i class="fa fa-globe fa-lg"></i>Official
                        Web Site</a>
                    <a id="fbLink" class="w3-btn w3-fbtheme w3-border w3-border-blue w3-hover-white "
                       href="http://<?= $commUser['facebook_url'] ?>" target="_blank"><i
                            class="fa fa-facebook-official fa-lg"></i>Facebook Page</a>
                    <a id="youtubeLink" class="w3-btn w3-hover-text-red w3-red w3-border w3-border-red w3-hover-white"
                       href="http://<?= $commUser['youtube_url'] ?>" target="_blank"><i class="fa fa-youtube fa-lg"></i>Youtube
                        Chanel</a>
                </div>
            </div>


        </div>
        <div class="col-lg-9 col-md-9"><!--this div contains the two toggling divs-->
            <div id="comm-user-content" class="row">


                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a data-toggle="tab" href="#promotions">Promotions</a></li>

                    <li role="presentation"><a data-toggle="tab" href="#recipes">Recipes</a></li>

                </ul>


                <div class="tab-content">
                    <div id="promotions" class="tab-pane fade in active">
                        <?php $promotions = json_decode($this->getAllPromotionsByUser($this->user_name), true);
                        foreach ($promotions as $promotion) {
                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xsm-12" style="margin-bottom: 15px">

                                <div class="w3-card-4 col-lg-12 col-md-12 col-sm-12 col-xsm-12" style="padding: 0px;">


                                    <img src="/Ambula/<?= $promotion['image_url'] ?>" alt="promotion image"
                                         class="w3-col l12 m12 s12" style="height: 200px; margin-bottom: 7px;">

                                    <div class="w3-container txt-center w3-col m12 l12 s12" style="padding:5px">
                                        <div class="txt-semibold"
                                             style="width: inherit; white-space: nowrap; overflow: hidden; text-overflow:ellipsis; text-transform: capitalize;">
                                            <h3>
                                                <?= $promotion['promotion_name'] ?>
                                            </h3>
                                        </div>
                                        <span
                                            class="txt-red txt-bold"><?= date('d-M-y', strtotime($promotion['start_date'])); ?></span><span> To </span><span
                                            class="txt-red txt-bold"><?= date('d-M-y', strtotime($promotion['end_date'])); ?> </span>

                                        <!--<a href="" class="w3-btn" data-toggle="modal" data-target="#myModal"
                                           style="float: left; width: 45%; background-color: #337ab7">Renew</a>
                                        <a href="" class="w3-btn w3-orange"
                                           style="float: right; width: 45%">Delete</a>-->

                                    </div>

                                </div>
                            </div>
                            <?php
                        }


                        ?>

                    </div>
                    <div id="recipes" class="tab-pane fade">
                        <!-- add in & active classes to make a tab first tab to display and selected-->

                        <?php $recipes = json_decode($this->getRecipesByUser($this->user_name), true);

                        foreach ($recipes as $recipe) {
                            ?>
                            <a href="/Ambula/recipes/viewRecipe/<?= $recipe['idRecipe']; ?>" target="_blank">

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xsm-12" style="margin-bottom: 15px">

                                    <div class="w3-card-4 col-lg-12 col-md-12 col-sm-12 col-xsm-12"
                                         style="padding: 0px;">

                                        <img src="/Ambula/uploads/recipes/<?= $recipe['idRecipe']; ?>/thumb.jpg ?>"
                                             alt="recipe image"
                                             class="w3-col l12 m12 s12" style="height: 200px; margin-bottom: 7px">

                                        <div class="w3-container w3-col m12 l12 s12" style="padding:5px">
                                            <div class="txt-semibold"
                                                 style="width: inherit; white-space: nowrap; overflow: hidden; text-overflow:ellipsis; text-transform: capitalize;">
                                                <h4 class="txt-center"><?= $recipe['title'] ?></h4>
                                            </div>
                                            <h5 class="txt-red txt-semibold" style="margin: 2px 0px 2px 0px">Views
                                                : <?= $recipe['views'] ?> <span
                                                    class="glyphicon glyphicon-eye-open"></span></h5>
                                            <h5 class="txt-red txt-bold" style="margin: 0px">Ratings
                                                : <?= $recipe['views'] ?>
                                                <span
                                                    class="glyphicon glyphicon-star">s</span></h5>

                                            <!--<a href="" class="w3-btn"
                                                   style="float: left; width: 45%; background-color: #337ab7">Update</a>
                                                <a href="" class="w3-btn w3-orange"
                                                   style="float: right; width: 45%">Delete</a>-->

                                        </div>

                                    </div>
                                </div>
                            </a>
                            <?php
                        }

                        ?>

                    </div>
                </div>


            </div>

            <!-- -div containing the user info, on load this dive is hidden-->
            <div id=comm-user-info class="col-lg-12 table-responsive w3-card-4">
                <table class="table w3-striped">
                    <tbody>
                    <tr id="companyNameTr">
                        <td class='infoFeildName'>Company Name</td>
                        <td><?= $commUser['company_name'] ?></td>
                        <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                    </tr>
                    <tr id="emailTr">
                        <td class='infoFeildName'>Email</td>
                        <td><?= $commUser['user_email'] ?></td>
                        <td></td>
                    </tr>
                    <tr id="natureOfCompanyTr">
                        <td class='infoFeildName'>Nature of The Company</td>
                        <td><?= $commUser['description'] ?></td>
                        <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                    </tr>
                    <tr id="userNameTr">
                        <td class='infoFeildName'>Username</td>
                        <td><?= $commUser['user_name'] ?></td>
                        <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                    </tr>
                    <tr id="hotlineTr">
                        <td class='infoFeildName'>Hotline</td>
                        <td><?= $commUser['telephone_1'] ?></td>
                        <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                    </tr>
                    <tr id="telephone2Tr">
                        <td class='infoFeildName'>Telephone 2</td>
                        <td><?= $commUser['telephone_2'] ?></td>
                        <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                    </tr>
                    <tr id="streetAddressTr">
                        <td class='infoFeildName'>Street Address</td>
                        <td><?= $commUser['address_1'] ?></td>
                        <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                    </tr>
                    <tr id="cityTr">
                        <td class='infoFeildName'>City</td>
                        <td><?= $commUser['city'] ?></td>
                        <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                    </tr>
                    <tr id="districtTr">
                        <td class='infoFeildName'>District</td>
                        <td><?= $commUser['district'] ?></td>
                        <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                    </tr>
                    <tr id="webSiteTr">
                        <td class='infoFeildName'>Company Web Site Link</td>
                        <td><?= $commUser['web_url'] ?></td>
                        <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                    </tr>
                    <tr id="facebookTr">
                        <td class='infoFeildName'>Facebook Page Link</td>
                        <td><?= $commUser['facebook_url'] ?></td>
                        <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                    </tr>
                    <tr id="youtubeTr">
                        <td class='infoFeildName'>Youtube Chanel Link</td>
                        <td><?= $commUser['youtube_url'] ?></td>
                        <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                    </tr>
                    <tr id="passwordTr">
                        <td class='infoFeildName'>Change Password</td>
                        <td>
                            <button class='w3-btn w3-medium w3-white w3-border w3-border-yellow' id='paaswordChangeBtn'>
                                Change Your Password
                            </button>
                        </td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

</div>

<!--alert message displaying div(success or failiure) -->
<div class='' id="toastMessage" style="display: none;">
    Selected Field was Successfully Updated
</div>

<!--  modal to update promotion time  -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false"
     style=" overflow: scroll; height:auto;" data-backdrop="false">
    <div class="container">
        <div class="row">
            <div class="modal-dialog modal-dialog-center col-m-12">
                <div class="modal-content row">
                    <div class="col-lg-12">
                        <div class="modal-header row">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Update promotion </h4>
                        </div>
                        <div class="modal-body row">
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <!-- Start date -->
                                    <label class="control-label" for="start_date">Starting Date</label>

                                    <div class="controls">
                                        <input id="startdate" name="start_date" class="form-control celenderForPromo"
                                               pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$"
                                               data-error="Please Pick a Valid Date" required>
                                    </div>
                                    <span class="help-block with-errors"></span>
                                </div>
                                <div class="form-group col-lg-4">
                                    <!-- End date -->
                                    <label class="control-label" for="end_date">Ending Date</label>

                                    <div class="controls">
                                        <input id="enddate" name="end_date" class="form-control celenderForPromo"
                                               pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$"
                                               data-error="Please Pick a Valid Date" required disabled>
                                    </div>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer row">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal to display current user info and to take the new user infor-->
<div class="modal fade" id="userInfoEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="false"
     style="overflow: scroll; height:auto;" data-backdrop="false">
    <div class="container">
        <div class="row">
            <div class="modal-dialog modal-dialog-center col-m-12">
                <div class="modal-content row">
                    <form id="updateFeildModalForm" action="/Ambula/profile/updateUserField" method="POST"
                          data-toggle="validator">
                        <div class="col-lg-12">
                            <div class="modal-header row">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="editModalTitle" style="color: #ffffff"></h4>
                            </div>
                            <div class="modal-body row" id="updateModalBodyContainer">
                                <table class="w3-table w3-striped" id="modalUpdateTable">
                                    <tr id="currInfoModal">
                                        <td class="modalInfoFeildName"></td>
                                        <td class="modalUserInfo" style="padding-left: 13px !important;"></td>
                                    </tr>
                                    <tr id="updateFeildsModal">
                                        <td class="modalInfoFeildName" style="padding-top: 20px !important;"></td>
                                        <td class="modalUserInfo" style="padding-right: 5px !important;"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer row">
                                <!--the hidden element to determine the table to be updated ( users or user_personal)-->
                                <input type="hidden" id="userTableType" name="user_table_type" value="">
                                <input type="hidden" id="userDetailColumn" name="user_detail_column" value="">

                                <input id="updateBtn" type="submit" class="w3-btn"
                                       style="background-color: #337ab7 !important; width: 150px; float: right;"
                                       value="Save Changes"/>
                                <button class="w3-btn w3-orange" data-dismiss="modal" aria-label="Close"
                                        style="color: #ffffff !important; float: right; margin-right: 10px;">
                                    Cancel Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal to take correct inputs to change password-->
<div class="modal fade" id="userPasswordUpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="false"
     style=" overflow: scroll; height:auto;" data-backdrop="false">
    <div class="container">
        <div class="row">
            <div class="modal-dialog modal-dialog-center col-m-12">
                <div class="modal-content row">
                    <form id="changePasswordModalForm" action="/Ambula/profile/updatePassword" method="POST"
                          data-toggle="validator">
                        <div class="col-lg-12">
                            <div class="modal-header row">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="" style="color: #ffffff">Change Your Password </h4>
                            </div>
                            <div class="modal-body row">
                                <table class="w3-table w3-striped" id="modalUpdateTable">
                                    <tr id="currPasswordTr">
                                        <td class="modalInfoFeildName">Current Password</td>
                                        <td class="modalUserInfo">
                                            <div class='form-group'>
                                                <div class='controls'>
                                                    <input type="password" id="currPassword" name="curr_password"
                                                           placeholder="" class="form-control"
                                                           data-native-error="Password Should Contain At Least 6 Characters"
                                                           data-remote="/Ambula/profile/checkPassword"
                                                           data-error="Current Password Doesn't Match With What You Entered"
                                                           required>
                                                </div>
                                                <span class='help-block with-errors'></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="newPasswordTr">
                                        <td class="modalInfoFeildName">New Password</td>
                                        <td class="modalUserInfo">
                                            <div class='form-group'>
                                                <div class='controls'>
                                                    <input type='password' id='newPassword'
                                                           name='new_password' data-minlength="6"
                                                           data-error="Password Should Contain At Least 6 Characters"
                                                           placeholder="" class="form-control"
                                                           required>
                                                </div>
                                                <span class='help-block with-errors'></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="confirmPasswordTr">
                                        <td class="modalInfoFeildName">Confirm New Password</td>
                                        <td class="modalUserInfo">
                                            <div class='form-group'>
                                                <div class='controls'>
                                                    <input type="password" id="confirmPassword"
                                                           name="confirm_password" data-match="#newPassword"
                                                           placeholder="" class="form-control"
                                                           required>
                                                </div>
                                                <span class='help-block with-errors'></span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer row">
                                <!--the hidden element to determine the table to be updated ( users or user_personal)-->
                                <input type="hidden" id="userTableType" name="user_table_type" value="">
                                <input type="hidden" id="userDetailColumn" name="user_detail_column" value="">

                                <input id="updateBtn" type="submit" class="w3-btn"
                                       style="background-color: #337ab7 !important; float: right;"
                                       value="Save Password"/>
                                <button class="w3-btn w3-orange" data-dismiss="modal" aria-label="Close"
                                        style="color: #ffffff !important; float: right; margin-right: 10px;">
                                    Cancel Change
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div


</body>

</html>