
var recipeStep;
var myDropzone;
var name = 1;

//file input
$(document).on('change', '.btn-file :file', function () {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});



//check recipe title availability
$(document).on('blur', '#recipetitle', function (e) {

    $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
        type: 'POST',
        data: {title: $(this).val()},
        url: 'http://theambula.lk/recipes/checkRecipeTitle',
        success: function (responseText) {
            // Get the result and asign to each cases
            if (responseText == 0) {
                $('#recipe-error').text('');
            }
            else if (responseText > 0) {
                $('#recipe-error').text('Recipe title already exists').css("color", "red");
            }
        }
    });
});

//continue button onclick removes the submit class and shows the specific divs
$(document).on('click', '.continue', function (e) {

    if (document.getElementsByName('ingname[]')[0].value.length > 0) {

        var flag = 1;

        $("[name=ingname\\[\\]]").each(function () {

            if (!$(this).val().match(/^[a-zA-Z\u0d80-\u0dfe0-9 ]*$/)) {
                $('#ing_error').html("ingredient Name only letters and White Spaces");
                flag = 0;
            }
            else{
                $('#ing_error').html("");
            }

        });

        if($('#category').val()==0){
            flag =0;
            $('#category-error').css("color", "red");
            $('#category-error').html("Choose a Category");
        }else{
            $('#category-error').html("");
        }

        if($('#recipephoto1').val() ==""){
            flag =0;
            alert("please add one photo");
        }


        if (flag == 1) {

            $(this).hide();
            $('#recipePart1').hide();
            $('#fields').hide();
            $('.back').show();
            $('.directions-control').show();
            $('#recipePart2').show();
            $('.submit').show();
            //$('.recipe-title').val($('#recipetitle').val());

            $('#tab_logic tbody').empty();
            //iterating through fields[] array and appending them to the table in the second form
            $("[name=ingname\\[\\]]").each(function () {
                var nextInput = $(this).closest('div').next('div').find('input');
                if ($(this).val().trim() != "")
                    $('#tab_logic').append('<tr ><td>' + $(this).val() + '</td><td>' + nextInput.val() + ' ' + nextInput.closest('div').next('div').find('select').val() + '</td></tr>');
            });
         }
    } else {
        alert("Enter at least one Ingredient");
    }


    window.onbeforeunload = function() {
        return "You are About to leave the page, if you wanna go back to previous menu press back button below";
    }


});


//back button
$(document).on('click', '.back', function (e) {

    $(this).hide();
    $('#recipePart1').show();
    $('#fields').show();
    $('.continue').show()
    $('.directions-control').hide();
    $('#recipePart2').hide();
    $('.submit').hide();

});

//change subcategory
$(document).on('change', '#category', function (e) {

    $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
        type: 'POST',
        dataType: "json",
        url: 'http://theambula.lk/recipes/getSubCategoriesArray/' + $(this).val(),
        data: {},
        success: function (responseText) {
            // Get the result and asign to each cases
            var subcateories = $('#subcategory');
            subcateories.empty();

            var json = responseText;
            for (var i = 0; i < json.length; i++) {
                var obj = json[i];

                subcateories.append($("<option></option>")
                    .attr("value", obj.idRecipe_sub_category).text(obj.title));
            }
        }
    });

});


$(window).on("navigate", function (event, data) {
    var direction = data.state.direction;
    alert(direction);
});




//onload
$(function () {


    $('#ingtitle').typeahead
    ({

        items: 5,
        source: function (query, process) {
            $.ajax({
                url: '/Ambula/recipes/getIngredientSuggestions',
                type: 'POST',
                dataType: 'JSON',
                data: 'query=' + query,
                success: function (data) {
                    var myarr = [];

                    $.each(data, function (i, item) {
                        myarr.push(item.title);
                    });
                    process(myarr);
                }
            });
        }
    });

     myDropzone = new Dropzone("#mydropzone",
        {
            url: "/Ambula/recipes/testDropZone?name="+name,
            maxFileSize: 5,
            acceptedFiles: ".jpg,.png,.jpeg,.gif",
            addRemoveLinks: true
        }

    );

    myDropzone.on("success", function(file, response) {

        $(file.previewTemplate).append('<span class="server_file" style="display: none;">'+response+'</span>');
    });

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        this.options.url = "/Ambula/recipes/testDropZone?name="+name++;

        if($('.dz-image').length > 0){
            //assign a hidden variable to check whethere the files are uploaded
            $('#dropzone-content').html('1');
        }
    });

    myDropzone.on("queuecomplete", function(progress) {
        //once the images are uploaded value is set to 0 so that we can submit the form
        $('#dropzone-content').html('0')
    });


    myDropzone.on("removedfile", function(file) {
        var server_file = $(file.previewTemplate).children('.server_file').text();
       // alert(server_file);
        // Do a post request and pass this path and use server-side language to delete the file

        $.ajax({
            type: 'POST',
            url: '/Ambula/recipes/deleteRecipeImage',
            data: {'name' : server_file },
            dataType: 'html',
            success: function (json) {
              alert(json);
            }
        });
    });

    // myDropzone.options.url =  "/Ambula/recipes/testDropZone?name="+$('.dz-image').length;


    $('#datetimepicker1').datetimepicker();
    $('#datetimepicker1').on("dp.change", function (e) {
        var time = $('#prep_time').val().split(":");

        if(time[0] < 2){
            $('#time-data').html(time[0]+" Hour and "+time[1]+" Minutes");
        }else{
            $('#time-data').html(time[0]+" Hours and "+time[1]+" Minutes");
        }

    });

  $('#datetimepicker2').datetimepicker();
    $('#datetimepicker2').on("dp.change", function (e) {
        var time = $('#cook_time').val().split(":");

        if(time[0] < 2){
            $('#time-data-2').html(time[0]+" Hour and "+time[1]+" Minutes");
        }else{
            $('#time-data-2').html(time[0]+" Hours and "+time[1]+" Minutes");
        }
    });

	//form submit
    $('#form1').on('submit', function() {

        if ($('#datetimepicker1').val().length != "00:00") {

            if (document.getElementsByName('steps[]')[0].value.length > 0) {
                if($('#dropzone-content').html != 0 ) {
                    if (confirm('Do you want to finish and continue ?')) {
                        $('#control-buttons').hide();
                        $('#recipePart2').hide();
                        $('.directions-control').hide();
                        $('.submit').hide();
                        $('#backbtn').hide();
                        $('#loading').show();

                        $.ajax({
                            url: $(this).attr('action'),
                            type: $(this).attr('method'),
                            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                            contentType: false,       // The content type used when sending data to the server.
                            cache: false,             // To unable request pages to be cached
                            processData: false,        // To send DOMDocument or non processed data file it is set to false
                            success: function (json) {
                                window.onbeforeunload = function () {
                                    return null;
                                };
                                alert(json);
                                var recipeId = json.substring(json.lastIndexOf(":") + 1, json.lastIndexOf(";"));
                                //window.location.href = "/recipes/recipeSuccess?id=" + recipeId;
                            }
                        });

                        return false;

                    } else {
                        return false;
                    }
                }else{
                    alert('files are uploading');
                }
            } else {
                alert("Tell us how to make it ");
                return false;
            }
        }
        else{
            alert("add preparation time ");
            return false;
        }

    });



    //hide two forms
     $('#recipePart2').hide();
    $('.directions-control').hide();
    $('.submit').hide();
    $('.back').hide();
     $('#loading').hide();


    //photos add
    $('.btn-file :file').on('fileselect', function (event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }

    });





        //ingredients add dynamic fields
    $(document).on('click', '.btn-add', function (e) {
        e.preventDefault();

        var controlForm = $('.ingredients-control'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function (e) {
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
    });

    //descirption add dynamic fields
    $(document).on('click', '.btn-add', function (e) {
        e.preventDefault();

        var controlForm = $('.directions-control'),
            currentEntry = $(this).parents('.entry2:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
         newEntry.find('img').attr('src','/public/img/no_preview_available.jpg');
        controlForm.find('.entry2:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function (e) {
        $(this).parents('.entry2:first').remove();

        e.preventDefault();
        return false;
    });


});


//click on image selector image
$(document).on('click', '.select-image', function (e) {


    $(this).toggleClass('selected-image').siblings().removeClass('selected-image');

    //sets the selected image to the recipe step image object
    recipeStep.find('.output').attr('src',$(this).attr('src'));
    recipeStep.find('input').val($(this).attr('src'));


    //hide popup model
    $('#myModal2').hide();
});



//click on image selector image
$(document).on('click', '.choose-image', function (e) {


    //gets the closest image object to the button that opens the modal
    recipeStep = $(this).closest('div').prev('div');

});


