<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="=/Ambula/public/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="/Ambula/public/css/style.css" type="text/css" rel="stylesheet"/>
    <link href="/Ambula/public/css/w3.css" type="text/css" rel="stylesheet"/>
    <link href="/Ambula/public/css/registration.css" rel="stylesheet" media="screen"/>

    <!-- fav icon -->
    <link rel="icon" href="/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/typeahead.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/script.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/registration/validator.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/modernizr.js"></script>


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
        /* Profile sidebar */

        .profile-userpic {
            width: 75%;
            height: 75%;
            margin: 0 13% 0 13%;
        }

        .profile-userpic img {
            float: none;
            margin: 0 auto;
            width: 100%;
            height: 100%;
            padding: 4px;
            border: 1px solid;
        }

        .profile-usertitle {
            text-align: center;
            margin-top: 10px;
            text-overflow: ellipsis;
        }

        .profile-usertitle-name {
            color: #5a7391;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 7px;
            margin: 5px 0px 5px 18%;
            float: left;
        }

        .profile-usertitle a {
            float: right;
            margin-right: 25%;
            color: #ffffff !important;
        }

        .profile-usermenu ul li {
            border-bottom: 1px solid #f0f4f7;
        }

        /* Profile Content */
        .profile-content {
            padding: 20px;
            background: #fff;
            padding-right: 350px;
            padding-top: 10px;
        }

        .infoFeildName {
            min-width: 220px;
            color: #5a7391;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 7px;
            padding-right: 0px !important;
        }

        table tr {
            height: 65px;
        }

        td {
            text-align: center;
            padding: 25px !important;
        }

        a:hover {
            cursor: pointer;
        }

        .edit {
            display: none;
        }

        tr:hover > td > a {
            display: inline;
        }

        /*css related to update modal view*/

        .modal {
            background: rgba(000, 000, 000, 0.6);
            min-height: 1000000px;
        }

        .modal-dialog-center {
            margin-top: 15%;
        }

        .modal-header {
            background: #e78f08;
            color: white;
        }

        /*css related to modal update feild contain table*/

        .modalInfoFeildName {
            color: #5a7391;
            font-size: 16px;
            font-weight: 600;
            padding-right: 0px !important;
            width: 250px !important;
        }

        .modalUserInfo {
            padding-left: 0px !important;
            text-align: left !important;
        }

        textarea {
            resize: none;
        }

        .form-control {
            border-radius: 0px;
        }

        /*============================================================*/
        /*CSS effect for the profile pic update button showing overlay*/
        /*============================================================*/

        .effects {
            /*
                        padding-left: 15px;
            */
        }

        .effects .img {
            position: relative;
            float: left;
            margin-bottom: 5px;
            overflow: hidden;
        }

        /*      un used styles for overlay by DRD
                .effects .img:nth-child(n) {
                    margin-right: 5px;
                }

                .effects .img:first-child {
                    margin-left: -15px;
                }

                .effects .img:last-child {
                    margin-right: 0;
                }*/

        .effects .img img {
            display: block;
            /*          margin: 0;
                        padding: 0;*/
            max-width: 100%;
            height: auto;
        }

        .overlay {
            display: block;
            position: absolute;
            z-index: 20;
            background: rgba(0, 0, 0, 0.6);
            overflow: hidden;
            transition: all 0.5s;
        }

        a.close-overlay {
            display: block;
            position: absolute;
            top: 0;
            right: 0;
            z-index: 100;
            width: 45px;
            height: 45px;
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            line-height: 45px;
            text-align: center;
            background-color: #000;
            cursor: pointer;
        }

        a.close-overlay.hidden {
            display: none;
        }

        a.expand {
            display: block;
            position: absolute;
            z-index: 100;
            width: 60px;
            height: 60px;
            border: solid 5px #fff;
            text-align: center;
            color: #fff;
            line-height: 50px;
            font-weight: 700;
            font-size: 30px;
            border-radius: 30px;
        }

        /* ============================================================ */
        /*    EFFECT 1 - SLIDE IN BOTTOM                                */
        /* ============================================================ */
        #effect-1 .overlay {
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 0;
        }

        #effect-1 .overlay a.expand {
            left: 0;
            right: 0;
            bottom: 50%;
            margin: 0 auto -30px auto;
        }

        #effect-1 .img.hover .overlay {
            height: 100%;
        }

        /*CSS to pop up the file browser window*/
        #uploadLink {
            text-decoration: none;
        }

        #uploadInput {
            display: none
        }

    </style>

    <script type="text/javascript">

        //variable to store the current recipe content of the user
        var profileContent = "";
        var userUpdated = false;

        // attach the function to the window resize event
        $(window).resize(onResize);

        //there can be only one document ready function for page
        $(document).ready(function () {
            onResize();
            updateUserField();
            updatePassword();
            displayOverlayButton();
            updateProfilePic();
        });

        //jquery call to pop up the image browse window when camera is clicked
        $(document).on('click', '#uploadLink', function (e) {
            e.preventDefault();
            $("#uploadInput:hidden").trigger('click');
        });

        //jquery call to view change password fields containing modal window
        $(document).on('click', '#paaswordChangeBtn', function (e) {
            $('#userPasswordUpdateModal').modal({show: true, keyboard: true});
        });

        //jquery call to view user info(call the JS method defined below)
        $(document).on('click', '#viewInfoBtn', function (e) {
            displayUserInfo();
        });

        //jquery call to view the edit modal of the selected info field
        $(document).on('click', '.edit', function (e) {
            var clickTrId = $(this).closest('tr').attr('id');
            editModalDisplay(clickTrId);
        });

        function onResize() {
            // apply dynamic padding at the top of the body according to the fixed navbar height
            $("#profileRow").css("margin-top", $(".navbar-fixed-top").height() + 5);
        }

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
                        $('#profilePicture').attr('src', '/Ambula/uploads/profile/personal_user/<?php echo $_SESSION['uid'].'/'.$_SESSION['uid'];?>.card.jpg?' + new Date().getTime());
                    },
                    error: function (exception) {
                        console.log('errord', exception);
                    }
                });
            });
        }

        //JS + ajax method to update the user password with new password in the modal window
        function updatePassword() {
            $('#changePasswordModalForm').validator().on('submit', function (e) {
                // Prevent form submission
                if (e.isDefaultPrevented()) {
                    // handle the invalid form

                } else {
                    // Prevent form submission
                    e.preventDefault();
                    // Use Ajax to submit form data
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function (response) {
                            if (response) {
                                $('#userPasswordUpdateModal').modal("hide");
                                displayUserInfo();
                            }
                        }
                    });
                }

            });
        }

        //JS + ajax method to update the Database using the data in the edit modal data feilds
        function updateUserField() {
            $('#updateFeildModalForm').validator().on('submit', function (e) {
                // Prevent form submission
                if (e.isDefaultPrevented()) {
                    // handle the invalid form

                } else {
                    // Prevent form submission
                    e.preventDefault();
                    // Use Ajax to submit form data
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function (response) {
                            if (response) {
                                $('#userInfoEditModal').modal("hide");
                                userUpdated = true;
                                displayUserInfo();
                            }
                        }
                    });
                }

            });
        }

        //JS + ajax method to take the info and displaying it in the edit modal
        function editModalDisplay(trId) {
            $.ajax({
                success: function (response) {
                    var htmlString;
                    $('#userInfoEditModal').modal({show: true, keyboard: true});
                    $('#editModalTitle').html("Update Your " + $('#' + trId + ' td:nth-child(1)').html());
                    $('#currInfoModal td:nth-child(1)').html("Current " + $('#' + trId + ' td:nth-child(1)').html());
                    $('#currInfoModal td:nth-child(2)').html($('#' + trId + ' td:nth-child(2)').html());
                    $('#updateFeildsModal td:nth-child(1)').html("Type In Your New " + $('#' + trId + ' td:nth-child(1)').html());
                    switch (trId) {
                        case 'firstNameTr':
                            htmlString = "<div class='form-group'><div class='controls'><input type='text' id='newUserValue' name='user_value' placeholder='' class='form-control' required> </div><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('user_personal');
                            $('#userDetailColumn').val('first_name');
                            break;
                        case 'lastNameTr' :
                            htmlString = "<div class='form-group'><div class='controls'><input type='text' id='newUserValue' name='user_value' placeholder='' class='form-control' required> </div><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('user_personal');
                            $('#userDetailColumn').val('last_name');
                            break;
                        case 'userNameTr' :
                            htmlString = "<div class='form-group'><div class='controls'><input type='text' id='newUserValue' name='user_value' placeholder='' class='form-control' pattern='^[A-Za-z0-9_-]{3,16}$' data-native-error='Username should at least contain 3 Characters (letter numbers and underscore)' data-remote='/Ambula/registration/checkUserName' data-error='username already exists ,choose a different one' maxlength='10'' required></div><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('users');
                            $('#userDetailColumn').val('user_name');

                            break;
                        case 'mobileTelTr':
                            htmlString = "<div class='form-group'><div class='controls'><input type='text' id='newUserValue' name='user_value' pattern='\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})' data-minlength='10' data-error='Invalid Telephone Number' placeholder='' class='form-control' required> </div><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('user_personal');
                            $('#userDetailColumn').val('tel_mobile');
                            break;
                        case 'homeTelTr':
                            htmlString = "<div class='form-group'><div class='controls'><input type='text' id='newUserValue' name='user_value' pattern='\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})' data-minlength='10' data-error='Invalid Telephone Number' placeholder='' class='form-control' required> </div><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('user_personal');
                            $('#userDetailColumn').val('tel_home');
                            break;
                        case 'addressTr':
                            htmlString = "<div class='form-group'><div class='controls'><textarea type='text' id='newUserValue' name='user_value' placeholder='' class='form-control' required rows='5'></textarea></div><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('user_personal');
                            $('#userDetailColumn').val('address');
                            break;
                        case 'aboutYouTr':
                            htmlString = "<div class='form-group'><div class='controls'><textarea type='text' id='newUserValue' name='user_value' placeholder='' class='form-control' required rows='5'></textarea></div><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('user_personal');
                            $('#userDetailColumn').val('description');
                            break;
                        case 'passwordTr':
                            htmlString = "<div class='form-group'><div class='controls'><input type='text' id='newUserValue' name='user_value' placeholder='' class='form-control' required> </div><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#userTableType').val('users');
                            $('#userDetailColumn').val('user_password_hash');
                            break;

                    }
                }
            });
        }

        //JS+ajax method to display all the user personal info of a logged in user in a table
        function displayUserInfo() {
            //to store recipes of the usesr currently viewing
            $.ajax({
                url: "/Ambula/profile/viewNormalUserInfo",
                success: function (response) {
                    var myVar = JSON.parse(response);
                    var i = 0;
                    var string = "";
                    while (myVar[i]) {
                        string += "<table id='userDetailDisplayTable' class='w3-table w3-bordered w3-striped w3-border w3-card-2'>";

                        string += "<tr id='firstNameTr'>";
                        string += "<td class='infoFeildName'>First Name</td>";
                        string += "<td id='currFirstName'>" + myVar[i].first_name + "</td>";
                        string += "<td class = 'firstName editTd'><a class='testClass edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>";
                        string += "</tr>";

                        string += "<tr id='lastNameTr'>";
                        string += "<td class='infoFeildName'>Last Name</td>";
                        string += "<td id='currLastName'>" + myVar[i].last_name + "</td>";
                        string += "<td class = 'editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>";
                        string += "</tr>";

                        string += "<tr id='emailTr'>";
                        string += "<td class='infoFeildName'>Email</td>";
                        string += "<td id='currUseEmail'>" + myVar[i].user_email + "</td>";
                        string += "<td class = 'editTd'></td>";
                        string += "</tr>";

                        string += "<tr id='userNameTr'>";
                        string += "<td class='infoFeildName'>Username</td>";
                        string += "<td id='currUseEmail'>" + myVar[i].user_name + "</td>";
                        string += "<td class = 'editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>";
                        string += "</tr>";

                        string += "<tr id='mobileTelTr'>";
                        string += "<td class='infoFeildName'>Mobile Phone</td>";
                        string += "<td id='currMobileTel'>" + myVar[i].tel_mobile + "</td>";
                        string += "<td class = 'editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>";
                        string += "</tr>";

                        string += "<tr id='homeTelTr'>";
                        string += "<td class='infoFeildName'>Home Phone</td>";
                        string += "<td id='currHomeTel'>" + myVar[i].tel_home + "</td>";
                        string += "<td class = 'editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>";
                        string += "</tr>";

                        string += "<tr id='addressTr'>";
                        string += "<td class='infoFeildName'>Address</td>";
                        string += "<td id='currAddress'>" + myVar[i].address + "</td>";
                        string += "<td class = 'editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>";
                        string += "</tr>";

                        string += "<tr id='aboutYouTr'>";
                        string += "<td class='infoFeildName'>About You</td>";
                        string += "<td id='currDescription'>" + myVar[i].description + "</td>";
                        string += "<td class = 'editTd'><a class='edit'><i class='glyphicon glyphicon-pencil'></i> Edit</a></td>";
                        string += "</tr>";

                        string += "<tr id='passwordTr'>";
                        string += "<td class='infoFeildName'>Change Your Password</td>";
                        string += "<td><button class='w3-btn w3-medium w3-white w3-border w3-border-yellow' id='paaswordChangeBtn'>Change Your Password</button></td>";
                        string += "<td></td>";
                        string += "</tr>";

                        string += "</table>";

                        //to set the new name in the side profile bar after updating
                        $("#profile-usertitle-name").html(myVar[i].first_name + " " + myVar[i].last_name);
                        i++;
                    }
                    if(userUpdated){
                        $("#profile-content").html(string);
                        $('#viewInfoBtn').html('View Recipes');
                        userUpdated = false;
                    }else{
                        if (!!profileContent) {//tre when recipes are present int the #profile-content
                            $('#viewInfoBtn').html('View Info');
                            $("#profile-content").html(profileContent);
                            profileContent = "";
                        } else {
                            profileContent = $("#profile-content").html();
                            $("#profile-content").html(string);
                            $('#viewInfoBtn').html('View Recipes');
                        }
                    }


                }
            });
        }

        //JS function display the profile pic update button overlay on the pro pic
        function displayOverlayButton() {
            if (Modernizr.touch) {
                // show the close overlay button
                $(".close-overlay").removeClass("hidden");
                // handle the adding of hover class when clicked
                $(".img").click(function (e) {
                    if (!$(this).hasClass("hover")) {
                        $(this).addClass("hover");
                    }
                });
                // handle the closing of the overlay
                $(".close-overlay").click(function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    if ($(this).closest(".img").hasClass("hover")) {
                        $(this).closest(".img").removeClass("hover");
                    }
                });
            } else {
                // handle the mouseenter functionality
                $(".img").mouseenter(function () {
                    $(this).addClass("hover");
                })
                    // handle the mouseleave functionality
                    .mouseleave(function () {
                        $(this).removeClass("hover");
                    });
            }
        }


    </script>

</head>

<body>
<div class="container-fluid">
    <div class="row">
        <?php $this->view('_template/navigation_menu', "normalProfileView") ?>
    </div>

    <div class="row profile" id="profileRow">
        <div class="col-md-3">
            <?php
            $result = json_decode($this->getUser(), true);

            ?>
            <!-- SIDEBAR USERPIC -->
            <div id="effect-1" class="row effects clearfix">
                <div class="profile-userpic img">
                    <?php if ($result['user_provider_type'] == 'FACEBOOK') { ?>
                        <img id="profilePicture"
                             src="https://graph.facebook.com/<?= $result[0]['user_facebook_uid'] ?>/picture?type=large"
                             class="img-responsive" alt="">
                    <?php } else if ($result['user_avatar'] == 1) { ?>
                        <img id="profilePicture"
                             src="/Ambula/uploads/profile/personal_user/<?= $result['user_id'] ?>/<?= $result['user_id'] ?>.card.jpg"
                             class="img-responsive" alt="<?= $result['user_name'] ?>">
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
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="row profile-usertitle">
                <div class="col-lg-7" style="">
                    <span class="profile-usertitle-name" id="profile-usertitle-name"
                          style="font-size: 20px; text-align: left;">
                        <?php if ($result['user_provider_type'] == "FACEBOOK") {
                            echo $result['user_name'];
                        } else {
                            echo $result['first_name'] . ' ' . $result['last_name'];
                        }
                        ?>
                    </span>
                </div>
                <div class="col-lg-5">
                    <a class="w3-btn w3-orange" id="viewInfoBtn">View Info</a>
                </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
        </div>
        <div class="col-md-9 col-sm-12 ">
            <div class="profile-content" id="profile-content">
                <?php $arrrecipe = json_decode($this->getRecipesByUser($this->user_name), true);
                foreach ($arrrecipe as $recipe) {
                    ?>

                    <div class="col-lg-3" style="width:320px; min-height: 335.2px">
                        <a href="http://localhost/Ambula/recipes/viewRecipe/<?= $recipe['idRecipe']; ?>">
                            <div class="w3-card-4" style="width:300px; min-height: 335.2px">
                                <img src="http://localhost/Ambula/uploads/<?= $recipe['idRecipe']; ?>/thumb.jpg"
                                     alt="Avatar" style="width:300px; height:250px;">

                                <div class="w3-container" style="border-top: 1px solid grey;">
                                    <h4><b><?= $recipe['title']; ?></b></h4>

                                    <p>Views : <?= $recipe['views'] ?> <i class="glyphicon glyphicon-eye-open"></i></p>

                                    <p>Rating: <?= $recipe['rating'] ?> <i class="glyphicon glyphicon-star"></i></p>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!alert message displaying div(success or failiure)
<div class='' id='toastMessage' style='display:none;'>
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
                            <div class="modal-body row">
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