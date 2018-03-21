$(document).ready(function(){

    //RECIEVING INFO FOR ORDER
    var all_orders = $('.order_list .order_item');
    var order = [];
    var customer = {};

    all_orders.each(function(){
        var productTitle = $(this).children('h3').html();
        var productId = $(this).attr('data-id');
        var additional = $(this).attr('data-add');
        var productQuantity = $(this).children().children().children('.js-quantity').html();
        var productPrice = $(this).children().children('.order-single-price-total').html();
        var orderInfo = {
            product:  productTitle,
            productId: productId,
            additional: additional,
            quantity: productQuantity,
            price: productPrice
        }
        order.push(orderInfo);
    });


    // PRESSING THE BUTTON AND SHWOING THE NEXT SECTION
    $('#orderGo').click(function(){

        //RECIEVING INFO ABOUT CUSTOMER
        var deliveryForm = $('#post-office_select').val();
        var deliveryMethod = $('.order_delivery-choose input:checked').val();
        var orderName = $('#order_name').val();
        var orderRegion = $('#order_region').val();
        var orderCity = $('#order_city').val();

        customer['Имя'] = orderName;
        customer['Почтовая компания'] = deliveryForm;
        customer['Область'] = orderRegion;
        customer['Город'] = orderCity;

        if(deliveryMethod == 'order_office'){
            var orderOfficeNumber = $('#order_post-office_number').val();

            customer['Способ доставки'] = 'В отделение';
            customer['Номер отделения'] = orderOfficeNumber;
        } else{
            var orderStreet = $('#order_street').val();
            var orderHouse = $('#order_house').val();
            var orderTime = 'с ' + $('#order_time_from').val() + ' до ' + $('#order_time_to').val();
            var orderComment = $('#order_comment').val();

            customer['Улица'] = orderStreet;
            customer['Дом'] = orderHouse;
            customer['Желательное время доставки'] = orderTime;
            customer['Комментарий'] = orderComment;
        }

        //GOING TO NEXT STEP
        $('.order_payment-list').show('400');
        $('.order_make_comment').hide('400');
        $('.order_delivery_form').hide('400');
        $('#orderGo').hide('400');
        $('.order_delivery').css('color', 'rgb(221,221,221)');
        $('.order_pay').css('color', 'rgb(17,24,32)');
    });
    $('.order_payment_method').click(function(){

        //RECIEVING INFO ABOUT CUSTOMER
        var orderPayment = $(this).children('h4').html();
        customer['Способ оплаты'] = orderPayment;        

        //GOING TO FINAL STEP
        $('.order_done_message').show('400');
        $('.order_payment-list').hide('400');
        $('.order_pay').css('color', 'rgb(221,221,221)');
        $('.order_done').css('color', 'rgb(17,24,32)'); 
        
        //SENDING DATA TO CONTROLLER
        sendData();
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


    

    //SENDING INFO TO ORDER-CONTROLLER
    function sendData(){
        var params = {
            customer: customer,
            order: order
        }
        $.post(templateUrl+'/order-controller.php', params, function(data){
            $('.shopping-cart_number').html('0');
            $('#order_id_from_db').html(data);
        })
    }
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


// ENABLE DISABLE BUTTON
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