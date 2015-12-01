//onload
$(function() {

    //hide two forms
    $('#recipePart2').hide();
    $('.directions-control').hide();
    $('.submit').hide();

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

});