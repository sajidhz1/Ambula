<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fav icon -->
    <link rel="icon" href="/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">

    <link href="/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="=/Ambula/public/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="/Ambula/public/css/style.css" type="text/css" rel="stylesheet"/>
    <link href="/Ambula/public/css/w3.css" type="text/css" rel="stylesheet"/>
    <link href="/Ambula/public/css/registration.css" rel="stylesheet" media="screen"/>

    <!--normal user css file import-->
    <link href="/Ambula/public/css/profile/norm-user-profile.css" rel="stylesheet" media="screen"/>

    <script type="text/javascript" src="/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/typeahead.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/script.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/registration/validator.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/modernizr.js"></script>
    <script type="text/javascript" src="//cdn.ckeditor.com/4.5.3/basic/ckeditor.js"></script>

    <!--normal user js file import-->
    <script type="text/javascript" src="/Ambula/public/js/profile/normal-user-profile.js"></script>


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

    <style type="text/css">


    </style>

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
                        //To reload the uploaded image without reloading the whole page
                        $('#profilePicture').attr('src', '/Ambula/uploads/profile/personal_user/<?php echo $_SESSION['uid'].'/'.$_SESSION['uid'];?>.card.jpg?' + new Date().getTime());
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
        <?php $this->view('_template/navigation_menu', "normalProfileView") ?>
    </div>

    <div id="profileRow" class="row profile">
        <?php $normUser = json_decode($this->getUser(), true); ?>
        <div class="col-lg-2 col-md-2">

            <!-- SIDEBAR USERPIC -->
            <div id="effect-1" class="row effects clearfix">
                <div class="profile-userpic col-lg-12 col-md-12 col-sm-12">
                    <?php if ($this->user_name === $_SESSION['username']) { ?>
                    <div class="img">
                        <?php if ($normUser['user_provider_type'] == 'FACEBOOK') { ?>
                            <img id="profilePicture"
                                 src="https://graph.facebook.com/<?= $normUser[0]['user_facebook_uid'] ?>/picture?type=large"
                                 class="img-responsive" alt="">
                        <?php } else if ($normUser['user_avatar'] == 1 || file_exists("/uploads/profile/personal_user/".$normUser['user_id']."/".$normUser['user_id']."card.jpg")) { ?>
                            <img id="profilePicture"
                                 src="/Ambula/uploads/profile/personal_user/<?= $normUser['user_id'] ?>/<?= $normUser['user_id'] ?>.card.jpg"
                                 class="img-responsive" alt="<?= $normUser['user_name'] ?>">
                        <?php } else { ?>
                            <img id="profilePicture" src="/Ambula/public/img/profile_avatar.jpg" class="img-responsive"
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
                    <?php } else {?>
                    <div>
                        <?php if ($normUser['user_provider_type'] == 'FACEBOOK') { ?>
                            <img id="profilePicture"
                                 src="https://graph.facebook.com/<?= $normUser[0]['user_facebook_uid'] ?>/picture?type=large"
                                 class="img-responsive" alt="">
                        <?php } else if ($normUser['user_avatar'] == 1) { ?>
                            <img id="profilePicture"
                                 src="/Ambula/uploads/profile/personal_user/<?= $normUser['user_id'] ?>/<?= $normUser['user_id'] ?>.card.jpg"
                                 class="img-responsive" alt="<?= $normUser['user_name'] ?>">
                        <?php } else { ?>
                            <img id="profilePicture" src="/Ambula/public/img/profile_avatar.jpg" class="img-responsive"
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
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="row profile-usertitle">
                <div class="col-lg-12 col-md-6 col-sm-12" style="">
                    <span class="profile-usertitle-name" id="profile-usertitle-name">
                        <h3>
                            <?php if ($normUser['user_provider_type'] == "FACEBOOK") { ?>
                                <span><?= $normUser['user_name'] ?></span>
                            <?php } else { ?>
                                <span id="first-name"><?= $normUser['first_name'] ?></span> <span
                                    id="last-name"><?= $normUser['last_name'] ?></span>
                            <?php } ?>
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

            <!-- END SIDEBAR USER TITLE -->
        </div>
        <div class="col-lg-9 col-md-9">

            <div id="norm-user-content" class="row">
                <?php $arrrecipe = json_decode($this->getRecipesByUser($this->user_name), true);
                foreach ($arrrecipe as $recipe) {
                    ?>
                    <a href="/Ambula/recipes/viewRecipe/<?= $recipe['idRecipe']; ?>" target="_blank">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xsm-12" style="margin-bottom: 15px">
                            <div class="w3-card-4 col-lg-12 col-md-12 col-sm-12 col-xsm-12" style="padding: 0px">
                                <img src="/Ambula/uploads/recipes/<?= $recipe['idRecipe']; ?>/thumb.jpg"
                                     alt="<?= $recipe['title']; ?>" class="w3-col l12 m12 s12"
                                     style="height: 200px;"/>

                                <div class="w3-container w3-col m12 l12 s12" style="padding:5px">
                                    <div class="txt-semibold txt-center"
                                         style="width: inherit; white-space: nowrap; overflow: hidden; text-overflow:ellipsis; text-transform: capitalize;">
                                        <h4><b><?= $recipe['title']; ?></b></h4>
                                    </div>


                                    <p class="txt-red">Views <i class="glyphicon glyphicon-eye-open"> <?= $recipe['views'] ?></i></p>

                                    <p class="txt-red">Ratings <i class="glyphicon glyphicon-star"> <?= $recipe['rating'] ?> </i></p>


                                    <!--<a href="" class="w3-btn w3-blue" data-toggle="modal" data-target="#myModal"
                                           style="float: right; width: 45%; background-color: #337ab7 !important;">Update</a>-->
                                    <!--<a href="" class="w3-btn w3-orange" style="float: left; width: 45%">Delete</a>-->
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>


            <!-- -div containing the user info, on load this dive is hidden-->
            <div id=norm-user-info class="col-lg-12 table-responsive w3-card-4">

                <table id='userDetailDisplayTable' class='w3-table w3-striped'>
                    <tablebody>
                        <tr id='firstNameTr'>
                            <td class='infoFeildName'>First Name</td>
                            <td id='currFirstName'><?= $normUser['first_name'] ?></td>
                            <td class='editTd'><a class='testClass edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a>
                            </td>
                        </tr>

                        <tr id='lastNameTr'>
                            <td class='infoFeildName'>Last Name</td>
                            <td id='currLastName'><?= $normUser['last_name'] ?></td>
                            <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                        </tr>

                        <tr id='emailTr'>
                            <td class='infoFeildName'>Email</td>
                            <td id='currUseEmail'><?= $normUser['user_email'] ?></td>
                            <td class='editTd'></td>
                        </tr>

                        <tr id='userNameTr'>
                            <td class='infoFeildName'>Username</td>
                            <td id='currUseEmail'><?= $normUser['user_name'] ?></td>
                            <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                        </tr>

                        <tr id='mobileTelTr'>
                            <td class='infoFeildName'>Mobile Phone</td>
                            <td id='currMobileTel'><?= $normUser['tel_mobile'] ?></td>
                            <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                        </tr>

                        <tr id='homeTelTr'>
                            <td class='infoFeildName'>Home Phone</td>
                            <td id='currHomeTel'><?= $normUser['tel_home'] ?></td>
                            <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                        </tr>

                        <tr id='addressTr'>
                            <td class='infoFeildName'>Address</td>
                            <td id='currAddress'><?= $normUser['address'] ?></td>
                            <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                        </tr>

                        <tr id='aboutYouTr'>
                            <td class='infoFeildName'>About You</td>
                            <td id='currDescription'><?= $normUser['description'] ?></td>
                            <td class='editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>
                        </tr>

                        <tr id='passwordTr'>
                            <td class='infoFeildName'>Change Your Password</td>
                            <td>
                                <button class='w3-btn w3-medium w3-white w3-border w3-border-yellow'
                                        id='paaswordChangeBtn'>Change Your Password
                                </button>
                            </td>
                            <td></td>
                        </tr>
                    </tablebody>
                </table>
            </div>

        </div>
    </div>
</div>

<!--alert message displaying div(success or failiure) -->
<div class='' id="toastMessage" style="display: none;">
    Selected Field was Successfully Updated
</div>

<div class="modal fade" id="userInfoEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="false"
     style=" overflow: scroll; height:auto;" data-backdrop="false">
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
                                        <td class="modalUserInfo"></td>
                                    </tr>
                                    <tr id="updateFeildsModal">
                                        <td class="modalInfoFeildName"></td>
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
</div>


</body>

</html>