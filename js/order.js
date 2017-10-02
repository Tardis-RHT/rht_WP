$(document).ready(function(){
    // PRESSING THE BUTTON AND SHWOING THE NEXT SECTION
    $('#orderGo').click(function(){
        $('.order_payment-list').show('400');
        $('.order_make_comment').hide('400');
        $('.order_delivery_form').hide('400');
        $('#orderGo').hide('400');
        $('.order_delivery').css('color', 'rgb(221,221,221)');
        $('.order_pay').css('color', 'rgb(17,24,32)');
    });
    $('.order_payment_method').click(function(){
        $('.order_done_message').show('400');
        $('.order_payment-list').hide('400');
        $('.order_pay').css('color', 'rgb(221,221,221)');
        $('.order_done').css('color', 'rgb(17,24,32)');        
    });

    // SHOW HIDE LABELS FOR INPUTS
    $(".order_input").focusin(function(){
      $("label[for='" + $(this).attr("id") + "']").css('opacity','1');
    });
    $(".order_input").focusout(function(){
      $("label[for='" + $(this).attr("id") + "']").css('opacity','0');
    });
    

    $('#order_courier').on('click', checkCourier(), checkCourier2());
    $('#order_office').on('click', checkOffice(), checkOffice2());
});


// CHOOSING DELIVERY METHOD - POST-OFFICE - COURIER
function deliveryChoose(){
    if($('#order_office').is(':checked')){
        $('#order_post-office_number').show('400');
        $('#order_post-office_label').show('400');
        $('.order_deliver-courier').hide('100');
        checkOffice();
    }else{
        $('#order_post-office_number').hide('100');
        $('#order_post-office_label').hide('100');
        $('.order_deliver-courier').show('400');
        checkCourier();
    }
};


// ENABLE DESABLE BUTTON
// $('#Button').prop('disabled', true);
// $('#Button').prop('disabled', false);

function checkOffice() {
    $('#order_name, #order_region, #order_city, #order_post-office_number').keyup(function() {
        var empty = false;
        $('#order_name, #order_region, #order_city, #order_post-office_number').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) {
            $('#orderGo').attr('disabled', 'disabled');
        } else {
            $('#orderGo').removeAttr('disabled');
        }
    });
};
function checkOffice2() {
        var empty = false;
        $('#order_name, #order_region, #order_city, #order_post-office_number').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) {
            $('#orderGo').attr('disabled', 'disabled');
        } else {
            $('#orderGo').removeAttr('disabled');
        }
};
function checkCourier() {
    $('#order_name, #order_region, #order_city, #order_street, #order_house, #order_time_from, #order_time_to, #order_comment').keyup(function() {
        var empty = false;
        $('#order_name, #order_region, #order_city, #order_street, #order_house, #order_time_from, #order_time_to, #order_comment').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) {
            $('#orderGo').attr('disabled', 'disabled');
        } else {
            $('#orderGo').removeAttr('disabled');
        }
    });
};
function checkCourier2() {
        var empty = false;
        $('#order_name, #order_region, #order_city, #order_street, #order_house, #order_time_from, #order_time_to, #order_comment').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) {
            $('#orderGo').attr('disabled', 'disabled');
        } else {
            $('#orderGo').removeAttr('disabled');
        }
};