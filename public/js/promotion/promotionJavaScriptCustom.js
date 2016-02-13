/**
 * Created by Dulitha RD on 2/7/2016.*/

$(document).ready(function () {
    $(".celenderForPromo").datepicker({
        dateFormat: "dd/mm/yy"
    });
    marginAdd();
});

$(document).on('change', "#startdate", function(){
    var date = $(this).val();
    if(date.length > 0 ){
        $("#enddate").prop("disabled", false);
    }else{
        $("#enddate").prop("disabled", true);
    }
});

//JS function to dynamically add margin for promotion adding form
var marginAdd = function() {
    // apply dynamic padding at the top of the body according to the fixed navbar height
    $(".registration-container").css("margin-top", $(".navbar-fixed-top").height());
};

// attach the function to the window resize event
$(window).resize(marginAdd);