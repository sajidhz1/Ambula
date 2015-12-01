/**
 * Created by sajidhz on 8/10/2015.
 */

//update recipe title
$(document).on('click', '#updateTitle', function (e) {

    $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
        type: 'POST',
        data: {title: $('#recipetitle').val(), recipeId: $('#recipeID').val()},
        url: 'http://theambula.lk/recipes/updateRecipeTitle',
        success: function (responseText) {
            // Get the result and asign to each cases
            if (responseText == 1) {
                alert("success");
            }
            else if (responseText > 0) {
                $('#recipe-error').text('Recipe title already exists').css("color", "red");
            }
        }
    });
});

//update recipe Category
$(document).on('click', '#updateCategory', function (e) {

    $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
        type: 'POST',
        data: {category: $('#category').val(), recipeId: $('#recipeID').val()},
        url: '/recipes/updateRecipeCategory',
        success: function (responseText) {
            // Get the result and asign to each cases
            if (responseText == 1) {
                alert("success");
            }
            else if (responseText > 0) {
                $('#recipe-error').text('Recipe title already exists').css("color", "red");
            }
        }
    });
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

    // delete ingredient
    $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
        type: 'POST',
        data: {rh_ingredient_id: $(this).parents('.entry:first').find('input').val()},
        url: '/recipes/deleteRecipeIngredient',
        success: function (responseText) {
            // Get the result and asign to each cases
            alert(responseText);
            if (responseText == 1) {
                alert("success");
            }
            else if (responseText > 0) {
                $('#recipe-error').text('Recipe title already exists').css("color", "red");
            }
        }
    });
    e.preventDefault();
    return false;
});

//descirption add dynamic fields
$(document).on('click', '.btn-add', function (e) {
    e.preventDefault();

    var controlForm = $('.new-directions'),
        currentEntry = $(this).parents('.entry2:first'),
        newEntry = $(currentEntry.clone()).appendTo(controlForm);

    newEntry.find('input').val('');
    newEntry.find('img').attr('src','/public/img/no_preview_available.jpg');

    controlForm.find('.entry2:not(:last) .btn-add')
        .removeClass('btn-add').addClass('btn-remove')
        .removeClass('btn-success').addClass('btn-danger')
        .html('<span class="glyphicon glyphicon-minus"></span>');
}).on('click', '.btn-remove1', function (e) {
    $(this).parents('.entry2:first').remove();
    //alert($(this).parents('.entry2:first').find('input').val());
    // delete description
    $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
        type: 'POST',
        data: {description_id: $(this).parents('.entry2:first').find('input').val()},
        url: '/recipes/deleteRecipeDescription',
        success: function (responseText) {
            // Get the result and asign to each cases
            alert(responseText);
            if (responseText == 1) {
                alert("success");
            }
            else if (responseText > 0) {
                $('#recipe-error').text('Recipe title already exists').css("color", "red");
            }
        }
    });
    e.preventDefault();
    return false;
});

//add new Ingredients
$(document).on('click', '#updateIngredients', function (e) {

    var ingname_array = $('input[name="ingname1[]"]').map(function () {
        return $(this).val();
    }).get();
    var amount_array = $('input[name="amount1[]"]').map(function () {
        return $(this).val();
    }).get();
    var metrics_array = $('input[name="metrics1[]"]').map(function () {
        return $(this).val();
    }).get();

    $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
        type: 'POST',
        data: {ingname: ingname_array, amount: amount_array, metrics: metrics_array, recipeId: $('#recipeID').val()},
        url: '/recipes/addNewIngredients',
        success: function (responseText) {
            // Get the result and asign to each cases
            alert(responseText);
            if (responseText == 1) {
                alert("success");
            }
            else if (responseText > 0) {
                $('#recipe-error').text('Recipe title already exists').css("color", "red");
            }
        }
    });
});

//add new Description
$(document).on('submit', '#form1', function (e) {

    var over = '<div id="overlay">' +
        '<img id="loading" src="/public/img/loading.gif">' +
        '</div>';
    $(over).appendTo('.directions-control');

    $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
        url: '/recipes/addNewDescription',
        type: 'POST',
        data: new FormData(this),
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false

        success: function (responseText) {

            if (responseText == 1) {
              $('#overlay').remove();
            }
            else if (responseText > 0) {
                $('#recipe-error').text('Recipe title already exists').css("color", "red");
            }
        }
    });

    return false;
});

//update time
$(document).on('click', '#updateTime', function (e) {

    $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
        type: 'POST',
        data: {time: $('#time').val(), recipeId: $('#recipeID').val()},
        url: '/recipes/updateRecipeTime',
        success: function (responseText) {
            // Get the result and asign to each cases
            if (responseText == 1) {
                alert("success");
            }
            else if (responseText > 0) {
                $('#recipe-error').text('Recipe title already exists').css("color", "red");
            }
        }
    });
});

//update tags
$(document).on('click', '#updateTags', function (e) {


    $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
        type: 'POST',
        data: {tags: $('#tags').val(), recipeId: $('#recipeID').val()},
        url: '/recipes/updateRecipeTags',
        success: function (responseText) {
            // Get the result and asign to each cases
            if (responseText == 1) {
                alert("success");
            }
            else if (responseText > 0) {
                $('#recipe-error').text('Recipe title already exists').css("color", "red");
            }
        }
    });
});


$(function () {

    $('#ex1').slider().on('slide', function (ev) {
        $('#time').html($('#ex1').data('slider').getValue() + " Hours and " + $('#ex2').data('slider').getValue() +" Minutes");
    });

    $('#ex2').slider().on('slide', function (ev) {
        $('#time').html($('#ex1').data('slider').getValue() + " Hours and " + $('#ex2').data('slider').getValue()+ " Minutes");
    });

});
