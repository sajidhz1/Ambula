<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>

    <link href="/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="=/Ambula/public/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="/Ambula/public/css/slider.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/Ambula/public/css/w3.css" rel="stylesheet">


    <!-- fav icon -->
    <link rel="icon" href="/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <script type="text/javascript" src="/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/typeahead.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/script.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/registration/validator.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/modernizr.js"></script>
    <script type="text/javascript" src="//cdn.ckeditor.com/4.5.3/basic/ckeditor.js"></script>

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


        .w3-fbtheme {color:#fff !important; background-color:#3b5998 !important}

        #webLink{
            background-color: #ff9800;
        }

        #webLink:hover{color:#ff9800 !important}

        #fbLink:hover{color:#3b5998 !important}

        #youtubeLink:hover{color:#f44336 !important}

        .profile-userpic {
            padding: 4px;
            border: 1px solid;
        }

        .profile-userpic img {
            float: none;
            margin: 0 auto;
            width: 100%;

        }

        .profile-usertitle {
            margin-top: 5px;
        }

        .profile-usertitle-name {
            color: #5a7391;
            font-size: 20px;
            font-weight: 600;
            float: left;
            margin-top: 5%;
            cursor: default;
            text-transform: uppercase;
        }

        #viewInfoBtn {
            float: right;
        }

        .profile-usertitle-job {
            color: #5b9bd1;
            font-size: 18px;
            font-weight: 500;
            margin: 15px 0px 15px 0px;
        }

        .profile-weblinks > div > a{
            padding-top: 8px;
            display: block;
            margin-bottom: 5px;
        }

        .profile-weblinks i{
            float: left;
        }

        #comm-user-info {
            display: none;
        }

        #comm-user-info{
            margin-bottom: 15px;
        }

        .infoFeildName {
            min-width: 220px;
            color: #5a7391;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 7px;
            padding-right: 0px !important;
            text-align: left;
        }

        #comm-user-content > table {
            border: 0.5px solid;
        }

        table tr {
            height: 65px;
        }

        td {
            text-align: left;
            padding: 25px !important;
        }

        a:hover {
            cursor: pointer;
        }

        .editTd {
            width: 100px;
        }

        .edit {
            display: none;
        }

        tr:hover > td > a {
            display: inline;
        }

        textarea{
            resize: none;
        }

        .modalInfoFeildName{
            padding: 10px 0px 5px 0px !important;
        }

        .modalUserInfo{
            padding: 10px 0px 5px 0px !important;
        }

        #modalUpdateTable tr{
            height: 25px;
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

        /*============================================================*/
        /*CSS effect for the profile pic update button showing overlay*/
        /*============================================================*/
        .effects {
            padding: 0 5%;
        }

        .effects .img {
            position: relative;
            float: left;
            margin-bottom: 5px;
            overflow: hidden;
        }

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

        /*CSS for toast message saying user update was success or not*/
        #toastMessage {
            width: 400px;;
            height: 70px;
            position: absolute;
            margin-left: 37%;
            margin-right: 37%;
            top: 30%;
            /*margin-left:-15%;*/
            bottom: 10px;
            background-color: #00ffff;
            color: #F0F0F0;
            font-family: Calibri;
            font-size: 20px;
            padding: 10px;
            text-align: center;
            border-radius: 2px;
            -webkit-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
            -moz-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
            box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
        }

    </style>

    <script type="text/javascript">

        //variable to store the current recipe content of the user
        var infoDisplay = false;
        var userUpdated = false;
        var globalTrId = "";

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
            globalTrId = clickTrId;
        });

        function onResize() {
            // apply dynamic padding at the top of the body according to the fixed navbar height
            $("#profileRow").css("margin-top", $(".navbar-fixed-top").height() + 15);
        }

        //JS function to display the update success or failed message
        function alertMessageDisplay(updateStatus) {
            $('#toastMessage').fadeIn(400).delay(2000).fadeOut(400);
            if (updateStatus) {
                $('#toastMessage').attr('class', 'w3-container w3-green');
                $('#toastMessage').html('Update Was Successfully Done');
            } else {
                $('#toastMessage').attr('class', 'w3-container w3-red');
                $('#toastMessage').html('An Error Occurred While Updating The Field.! ');
            }

        }

        //JS function with ajax call to update the just updated field in the table
        function reloadUserField(table, column){
            $.ajax({
                url: "/Ambula/profile/refreshUserField",
                type: "POST",
                data: {userTable : table, userColumn : column},
                success: function (response) {
                    var myVar = JSON.parse(response);
                    $('#' + globalTrId + ' td:nth-child(2)').html(myVar[0][column]); //to updated the <td> containing the current user data field
                    switch (column){
                        case 'company_name': $('#profile-usertitle-name').html(myVar[0][column]);
                            break;
                        case 'web_url' : $('#webLink').attr('href',"http://"+myVar[0][column]);
                            break;
                        case 'facebook_url':$('#fbLink').attr('href',"http://"+myVar[0][column]);
                            break;
                        case 'youtube_url':$('#youtubeLink').attr('href',"http://"+myVar[0][column]);
                            break;
                    }
                }
            });
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
                        $('#profilePicture').attr('src', '/Ambula/uploads/profile/commercial_user/<?php echo $_SESSION['uid'].'/'.$_SESSION['uid'];?>.card.jpg?' + new Date().getTime());
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
                                alertMessageDisplay(true);
                                $('#toastMessage').html('Password Was Successfully Updated.');
                                $("input[type='password']").val('');
                            }
                        },
                        error: function (exception) {
                            alertMessageDisplay(false);
                            $('#toastMessage').html('An Error Occurred While Updating The Password.!');
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

                    //check if the description is updated
                    if(globalTrId == 'natureOfCompanyTr'){
                        for (instance in CKEDITOR.instances) {
                            CKEDITOR.instances[instance].updateElement();
                        }
                    }
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function (response) {
                            if (response) {
                                $('#userInfoEditModal').modal("hide");
                                reloadUserField($('#userTableType').val(),$('#userDetailColumn').val());
                                alertMessageDisplay(true);
                            } else {
                                alertMessageDisplay(false);
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
                        case 'companyNameTr':
                            htmlString = "<div class='form-group'><div class='controls'><input type='text' id='newUserValue' name='user_value' placeholder='' class='form-control' required> </div><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('commercial_user');
                            $('#userDetailColumn').val('company_name');
                            break;
                        case 'natureOfCompanyTr' :
                            htmlString = "<div class='form-group'><div class='controls'><textarea id='newUserValue' name='user_value' class='ckeditor col-lg-12 col-sm-12' required></textarea></div><span class='help-block with-errors'></span></div>";
                            $('#updateModalBodyContainer').html(htmlString); //replace the whole table
                            CKEDITOR.replace('user_value'); //this is essential to display the ckeditor
                            $('#newUserValue').html($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('commercial_user');
                            $('#userDetailColumn').val('description');

                            break;
                        case 'userNameTr' :
                            htmlString = "<div class='form-group'><div class='controls'><input type='text' id='newUserValue' name='user_value' placeholder='' class='form-control' pattern='^[A-Za-z0-9_-]{3,16}$' data-native-error='Username should at least contain 3 Characters (letter numbers and underscore)' data-remote='/Ambula/registration/checkUserName' data-error='username already exists ,choose a different one' maxlength='10'' required></div><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('users');
                            $('#userDetailColumn').val('user_name');

                            break;
                        case 'hotlineTr':
                            htmlString = "<div class='form-group'><div class='controls'><input type='text' id='newUserValue' name='user_value' pattern='\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})' data-minlength='10' data-error='Invalid Telephone Number' placeholder='xxxx xxx xxx' class='form-control' required> </div><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('commercial_user');
                            $('#userDetailColumn').val('telephone_1');
                            break;
                        case 'telephone2Tr':
                            htmlString = "<div class='form-group'><div class='controls'><input type='text' id='newUserValue' name='user_value' pattern='\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})' data-minlength='10' data-error='Invalid Telephone Number' placeholder='xxxx xxx xxx' class='form-control' required> </div><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('commercial_user');
                            $('#userDetailColumn').val('telephone_2');
                            break;
                        case 'streetAddressTr':
                            htmlString = "<div class='form-group'><div class='controls'><textarea type='text' id='newUserValue' name='user_value' placeholder='' class='form-control' required rows='5'></textarea></div><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('commercial_user');
                            $('#userDetailColumn').val('address_1');
                            break;
                        case 'cityTr':
                            htmlString = "<div class='form-group'><div class='controls'><input type='text' id='newUserValue' name='user_value' placeholder='' class='form-control' required></div><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('commercial_user');
                            $('#userDetailColumn').val('city');
                            break;
                        case 'districtTr':
                            htmlString = "<div class='form-group'><div class='controls'>";
                            htmlString += "<select class='form-control' id='newUserValue' name='user_value' required>";
                            htmlString += "<option value='' selected hidden disabled>Select a new district..</option>";
                            htmlString += "<option value='Ampara'>Ampara</option>";
                            htmlString += "<option value='Anuradhapura'>Anuradhapura</option>";
                            htmlString += "<option value='Badulla'>Badulla</option>";
                            htmlString += "<option value='Batticaloa'>Batticaloa</option>";
                            htmlString += "<option value='Colombo'>Colombo</option>";
                            htmlString += "<option value='Galle'>Galle</option>";
                            htmlString += "<option value='Gampaha'>Gampaha</option>";
                            htmlString += "<option value='Hambantota'>Hambantota</option>";
                            htmlString += "<option value='Jaffna'>Jaffna</option>";
                            htmlString += "<option value='Kalutara'>Kalutara</option>";
                            htmlString += "<option value='Kandy'>Kandy</option>";
                            htmlString += "<option value='Kegalle'>Kegalle</option>";
                            htmlString += "<option value='Kilinochchi'>Kilinochchi</option>";
                            htmlString += "<option value='Kurunegala'>Kurunegala</option>";
                            htmlString += "<option value='Mannar'>Mannar</option>";
                            htmlString += "<option value='Matale'>Matale</option>";
                            htmlString += "<option value='Matara'>Matara</option>";
                            htmlString += "<option value='Monaragala'>Monaragala</option>";
                            htmlString += "<option value='Mullaitivu'>Mullaitivu</option>";
                            htmlString += "<option value='Nuwara Eliya'>Nuwara Eliya</option>";
                            htmlString += "<option value='Polonnaruwa'>Polonnaruwa</option>";
                            htmlString += "<option value='Puttalam'>Puttalam</option>";
                            htmlString += "<option value='Ratnapur'>Ratnapura</option>";
                            htmlString += "<option value='Trincomalee'>Trincomalee</option>";
                            htmlString += "<option value='Vavuniya'>Vavuniya</option>";
                            htmlString += "</select>";
                            htmlString += "<span class='help-block with-errors'></span>";
                            htmlString += "</div></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#userTableType').val('commercial_user');
                            $('#userDetailColumn').val('district');
                            break;
                        case 'webSiteTr':
                            htmlString = "<div class='form-group has-feedback has-feedback-left'><div class='controls'><input type='text' id='newUserValue' name='user_value' placeholder='www.youWebSite.com' class='form-control' required></div><i class='form-control-feedback fa fa-globe fa-lg' style='padding-top: 8px'></i><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('commercial_user');
                            $('#userDetailColumn').val('web_url');
                            break;
                        case 'facebookTr':
                            htmlString = "<div class='form-group has-feedback has-feedback-left'><div class='controls'><input type='text' id='newUserValue' name='user_value' placeholder='www.youFacebookPage.com' class='form-control' required></div><i class='form-control-feedback fa fa-facebook-official fa-lg' style='padding-top: 8px'></i><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('commercial_user');
                            $('#userDetailColumn').val('facebook_url');
                            break;
                        case 'youtubeTr':
                            htmlString = "<div class='form-group has-feedback has-feedback-left'><div class='controls'><input type='text' id='newUserValue' name='user_value' placeholder='www.yourYoutubeChanel.com' class='form-control' required></div><i class='form-control-feedback fa fa-youtube fa-lg' style='padding-top: 8px'></i><span class='help-block with-errors'></span></div>";
                            $('#updateFeildsModal td:nth-child(2)').html(htmlString);
                            $('#newUserValue').val($('#' + trId + ' td:nth-child(2)').html());
                            $('#userTableType').val('commercial_user');
                            $('#userDetailColumn').val('youtube_url');
                            break;

                    }
                    $('#userInfoEditModal').data('bs.modal').handleUpdate()
                }
            });
        }

        //JS+ajax method to display all the user personal info of a logged in user in a table
        function displayUserInfo() {
            $("#comm-user-content").fadeToggle(500 , 'linear');
            $('#comm-user-info').fadeToggle(500, 'linear');
            if (infoDisplay) {
                $('#viewInfoBtn').html('View Info');
                infoDisplay = false;
            } else {
                $('#viewInfoBtn').html('View Content');
                infoDisplay = true;
            }
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
        <?php $this->view('_template/navigation_menu', "newRecipe"); ?>
    </div>



    <div id="profileRow" class="row">
        <?php $commUser = json_decode($this->getCooperateUserDetails($this->user_name), true); ?>
        <div class="col-lg-3" style="text-align: center;">
            <div id="effect-1" class="row effects clearfix">
                <div class="profile-userpic img">

                    <img id="profilePicture"
                         src="/Ambula/uploads/profile/commercial_user/<?= $commUser['users_user_id'] ?>/<?= $commUser['users_user_id'] ?>.card.jpg"
                         class="img-responsive" alt="<?= $this->user_name ?>">

                    <div class="overlay">
                        <a id="uploadLink" class="expand">
                            <i class="glyphicon glyphicon-camera" aria-hidden="true"></i>
                        </a>
                        <input type="file" id="uploadInput" name="upload_input"/>
                        <a class="close-overlay hidden">x</a>
                    </div>
                </div>
            </div>
            <div class="row profile-usertitle">
                <div class="col-lg-12 col-md-7">
                    <div class="col-lg-7" style="">
                    <span class="profile-usertitle-name" id="profile-usertitle-name">
                        <?= $commUser['company_name'] ?>
                    </span>
                    </div>
                    <div class="col-lg-5">
                        <a class="w3-btn w3-orange" id="viewInfoBtn">View Info</a>
                    </div>
                </div>
            </div>
            <div class="row profile-usertitle-job">
                <?php $commUserCategories = json_decode($this->getCategoriesByUser($this->user_name), true); ?>
                <div class="col-lg-12">
                    <?php foreach ($commUserCategories as $category) {?>
                    <span><?= $category['title']?>,</span>
                    <?php }?>
                </div>
            </div>
            <div class="row profile-weblinks">
                <div class="col-lg-10 col-md-10 col-md-offset-1 col-lg-offset-1">
                    <a id="webLink" class="w3-btn w3-border w3-border-orange w3-hover-white" href="http://<?= $commUser['web_url'] ?>" target="_blank"><i class="fa fa-globe fa-lg"></i>Official Web Site</a>
                    <a id="fbLink" class="w3-btn w3-fbtheme w3-border w3-border-blue w3-hover-white " href="http://<?= $commUser['facebook_url'] ?>" target="_blank"><i class="fa fa-facebook-official fa-lg"></i>Facebook Page</a>
                    <a id="youtubeLink" class="w3-btn w3-hover-text-red w3-red w3-border w3-border-red w3-hover-white" href="http://<?= $commUser['youtube_url'] ?>" target="_blank"><i class="fa fa-youtube fa-lg"></i>Youtube Chanel</a>
                </div>
            </div>


        </div>
        <div class="col-lg-9"><!--this div contains the two toggling divs-->
            <div id="comm-user-content" class="col-lg-12">


                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a data-toggle="tab" href="#promotions">Promotions</a></li>

                    <li role="presentation"><a data-toggle="tab" href="#recipes">Recipes</a></li>

                </ul>


                <div class="tab-content">
                    <div id="promotions" class="tab-pane fade in active" style="border: 1px solid #b1b1b1;">
                        <?php $promotions = json_decode($this->getAllPromotionsByUser($this->user_name), true);
                        foreach ($promotions as $promotion) {
                            ?>
                            <div class="w3-card-4 w3-col l3 m3 s12" style="margin: 15px;">


                                <img src="/Ambula/<?= $promotion['image_url'] ?>" alt="promotion image"
                                     class="w3-col l12 m12 s12" style="height: 200px; margin-bottom: 7px;">

                                <div class="w3-container">
                                    <h4 class="w3-col l12 m12 s12" ><span style="overflow:hidden;text-overflow: ellipsis;"><?= $promotion['promotion_name'] ?></span></h4>
                                    <span  class="glyphicon glyphicon-calendar"><?=$promotion['start_date']." To ". $promotion['end_date']; ?></span>
                                    <div class="w3-container w3-center"
                                         style="margin:5px 0px 5px 0px; padding: 2px 0px 0px 0px;">
                                        <a href="" class="w3-btn" data-toggle="modal" data-target="#myModal"
                                           style="float: left; width: 45%; background-color: #337ab7">Renew</a>
                                        <a href="" class="w3-btn w3-orange" style="float: right; width: 45%">Delete</a>
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
                            <div class="w3-card-4 w3-col l3 m3 s12" style="margin: 15px;">

                                <img src="/Ambula/uploads/<?= $recipe['idRecipe']; ?>/thumb.jpg ?>" alt="recipe image"
                                     class="w3-col l12 m12 s12" style="height: 240px; margin-bottom: 5px">

                                <div class="w3-container">
                                    <h4 style="margin-bottom: 4px"><?= $recipe['title'] ?></h4>
                                    <h5 style="margin: 2px 0px 2px 0px">Views : <?= $recipe['views'] ?> <span
                                            class="glyphicon glyphicon-eye-open"></span></h5>
                                    <h5 style="margin: 0px">Ratings : <?= $recipe['views'] ?> <span
                                            class="glyphicon glyphicon-star">s</span></h5>

                                    <div class="w3-container w3-center"
                                         style="margin:5px 0px 5px 0px; padding: 2px 0px 0px 0px; border-top: 1px #959999 solid">
                                        <a href="" class="w3-btn"
                                           style="float: left; width: 45%; background-color: #337ab7">Update</a>
                                        <a href="" class="w3-btn w3-orange" style="float: right; width: 45%">Delete</a>
                                    </div>

                                </div>


                            </div>
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