/**
 * Created by Dulitha RD on 2/7/2016.*/

$(document).ready(function () {
    $(".celenderForPromo").datepicker({
        dateFormat: "dd/mm/yy"
    });
    marginAdd();
});

$(function () {

    function setProgress(precis) {
        var progress = $('#progress');

        progress.toggleClass('active', precis < 100);

        progress.css({
            width: precis = precis.toPrecision(3)+'%'
        }).html('<span>'+precis+'</span>');
    }

    $('#newPromotionForm').on('submit', function () {

        CKupdate();
        $('#progressModal').modal('show');
        $('#newPromotionForm').hide();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (json) {

                $('#newPromotionForm')[0].reset();
                //window.onbeforeunload = function () {
                //    return null;
                //};

                //var recipeId = json.substring(json.lastIndexOf(":") + 1, json.lastIndexOf(";"));
                window.location.href = "/promotions/?id=1";
            },
            progress: function(e) {

                if(e.lengthComputable) {
                    setProgress(e.loaded / e.total * 100);
                    var content = e.srcElement.responseText;
                    alert(progress);
                }
                else {
                    // TODO add message error 'Content Length not reported!';
                }
            }
        });

        return false;
    });


});


function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}


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