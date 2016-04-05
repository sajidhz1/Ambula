/**
 * Created by Dulitha RD on 4/4/2016.
 */
//variable to store the current recipe content of the user
var infoDisplay = false;
var globalTrId = "";
var originalTableHtml = "";

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
    //To restore the table back to modal, if it was replaced by ckeditor
    if((globalTrId == 'aboutYouTr') && originalTableHtml){
        $('#updateModalBodyContainer').html(originalTableHtml);
    }
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
                    originalTableHtml = $('#updateModalBodyContainer').html(); //to store the table before replacing it with ckeditor
                    $('#updateModalBodyContainer').html(htmlString);//replace the whole table                            CKEDITOR.replace('user_value'); //this is essential to display the ckeditor
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