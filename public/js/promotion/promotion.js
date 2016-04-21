/**
 * Created by Dulitha RD on 2/7/2016.*/
// attach the function to the window resize event
$(window).resize(onResize);

//there can be only one document ready function for page
$(document).ready(function () {
    onResize();
    viewPromotionsofType('restaurant');  //to view all 'restaurant' type promotions onload of the view (all document ready functions go here)
    addNewPromotion();
    datePickerSetter();
});

//date picker customisation
/*$(document).on('change', "#startdate", function(){
    var startDate = new Date(isoDateString($(this).val()));
    if(startDate){
        $("#enddate").prop("disabled", false);

        $("#enddate").datepicker({
            dateFormat: "dd/mm/yy",
            minDate: startDate
        });
    }else{
        $("#enddate").prop("disabled", true);
    }
});*/

function datePickerSetter() {
    var dateToday = new Date();
    $( "#startdate" ).datepicker({
        dateFormat: "dd/mm/yy",
        minDate: dateToday,
        onClose: function( selectedDate ) {
            $( "#enddate" ).datepicker( "option", "minDate", selectedDate);
        }
    });
    $( "#enddate" ).datepicker({
        dateFormat: "dd/mm/yy",
        onClose: function( selectedDate ) {

        }
    });

    $(document).on('change', "#startdate", function(){
        $("#enddate").val('');
    });
}

//jquery method for displaying all the promotions in the type selected
$(document).on('click', '.promoType', function (e) {
    var type = $(this).attr('id');
    viewPromotionsofType(type);
});

//jquery method to view a single promotion enlarged
$(document).on('click', '.singlePromo', function (e) {
    var id = $(this).attr('id');
    open_single_promoModal(id);
});

function onResize() {
    // apply dynamic padding at the top of the body according to the fixed navbar height
    $("#promotionAddRow").css("margin-top", $(".navbar-fixed-top").height()+15);
    $("#promotionViewRow").css("margin-top", $(".navbar-fixed-top").height()+1);
}

//js + ajax function to view all promotions in a type
function viewPromotionsofType(type){
    $.ajax({
        type: "POST",
        url: "/Ambula/promotion/viewAllPromotions",
        dataType: "html",
        data: {promotoionType: type},
        success: function (response) {
            var text = response;
            $("#promotionContainer").html(text);
        }
    });
}


function open_single_promoModal(id) {
    $.ajax({
        type: "POST",
        url: "/Ambula/promotion/viewSinglePromotion",
        data: {promotoionId: id},
        success: function (response) {
            var myVar = JSON.parse(response);
            var pId, pUId, pType, pName, pImg, pDescription, pStartDate, pEndDate, pDateAdded;
            pId = myVar[0].idPromotion;
            pUId = myVar[0].users_user_id;
            pType = myVar[0].promotion_type;
            pName = myVar[0].promotion_name;
            pImg = myVar.img_url;
            pDescription = myVar[0].description;

            pStartDate = new Date(myVar[0].start_date);
            pStartDate = formatDate(pStartDate,false);

            pEndDate = new Date(myVar[0].end_date);
            pEndDate = formatDate(pEndDate,false);

            pDateAdded = myVar[0].date_time_added;
            $('#promoViewModal').modal({show: true, keyboard: true});  // put your modal id
            $("#singlePromoModalImg > img").attr("src", "/Ambula/" + pImg);
            $("#modal-title").html(myVar[0].promotion_name);
            $("#modal-description").html(pDescription);
            $("#from").html(pStartDate);
            $("#till").html(pEndDate);
            $('meta[name=og\\:image]').attr('content', pImg);
            $('meta[name=og\\:title]').attr('content', pName);

        }
    });
}

//js method to submit the new promotion adding form to promotion modal and then to db
function addNewPromotion() {

    $('#newPromotionForm').validator().on('submit', function (e) {

        if (e.isDefaultPrevented()) {

        } else {
            CKupdate();
            $('#progressModal').modal('show');
            $('#newPromotionForm').fadeToggle(100, 'linear');
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (json) {
                    $('#newPromotionForm')[0].reset();
                    window.location.href = "/Ambula/promotion?id="+json;
                },
                progress: function (e) {

                    if (e.lengthComputable) {
                        setProgress(e.loaded / e.total * 100);
                        var content = e.srcElement.responseText;
                        console.log(content);
                    }
                    else {
                        console.log(e);
                    }
                }
            });

            return false;
        }
    });


}

//js method to set the progress bar accordingly
function setProgress(precis) {
    var progress = $('#progress');

    progress.toggleClass('active', precis < 100);

    progress.css({
        width: precis = precis.toPrecision(3)+'%'
    }).html('<span>'+precis+'</span>');
}

function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}

function formatDate(d, standard) {

    var dd = d.getDate()
    if ( dd < 10 ) dd = '0' + dd

    var mm = d.getMonth()+1
    if ( mm < 10 ) mm = '0' + mm

    var yy = d.getFullYear()
    if ( yy < 10 ) yy = '0' + yy

    if(standard){
        return yy+'/'+mm+'/'+dd;
    }else{
        return dd+'/'+mm+'/'+yy;
    }
}

function isoDateString(date){
    var dateArray = date.split("/")
    return dateArray[2]+"/"+dateArray[1]+"/"+dateArray[0];
}
