
$(function(){
	// MOBILE MENU
	$('#burger').click(function() {
			$('.mobile_menu').toggle();
			$(this).toggleClass('zmdi-menu').toggleClass('zmdi-close');
	});
	// MOBILE MENU END


	// CHANGE LANGUAGE MENU START
	$(document).ready(function() {
		$('.languagepicker li:first').addClass('chevron_down');
	});
	$('.languagepicker').hover(function() {
		$('.languagepicker li').css('display','block');
		$('.languagepicker li:first').addClass('chevron_up');
		$('.languagepicker li:first').removeClass('chevron_down');
		$('.header_lang').mouseleave(function(){
			$('.languagepicker li:nth-child(2)').css('display','none');
			$('.languagepicker li:nth-child(3)').css('display','none');
			$('.languagepicker li:first').removeClass('chevron_up');
			$('.languagepicker li:first').addClass('chevron_down');
		});
	});
	// CHANGE LANGUAGE MENU END

	// STCIKY HEADER
	$(window).scroll(function() {
	  if($(this).scrollTop() >= 40) {
		  $('.header_wrapper_big').addClass('stickytop');
		  $('.header_cart_bye-text').addClass('invisible');
		  $('.header_cart_call').removeClass('invisible');
		  $('.header_cart_buy').css('margin','0 0 0 20px');
	  }
	  else{
		  $('.header_wrapper_big').removeClass('stickytop');
		  $('.header_cart_bye-text').removeClass('invisible');
		  $('.header_cart_call').addClass('invisible');
	  }
	});
	// END OF STCIKY HEADER
 
	// LightGallery call and settings

	
	// FURNITURA VIDEO
	$('#videoFurnitura').lightGallery({
		videoMaxWidth: '100%',
		autoPlay: true,
		controls: false,
		counter: false,
		download: false,
	}); 
	// $(window).resize(function () {
	// 	var width = $('body').outerWidth()
	// 	if ($(window).width() < 620){
	// 		$('.main_benefits_container').attr('id', 'lightSlider');
	// 	}
	// 	else {
	// 		$('.main_benefits_container').removeAttr('id', 'lightSlider');
	// 	}
	// }); 


	// ANCHOR SCROLL
	$(document).ready(function() {
		$(".main_page_video-scroll").click(function () {
			var elementClick = $(this).attr("href");
			var destination = $(elementClick).offset().top - $('.header_wrapper_big').height() + 1;
			$("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 800);
			return false;
			});
		});


	// LightSlider call and settings
	$("#lightSlider").lightSlider({
		gallery: false,
		// item: 1,
		loop: true,
		slideMargin: 0,
		controls: true,
		adaptiveHeight: true,
		pager: false,
		autoWidth: true
	});



	$("#lightSlider_filenka").lightSlider({
		gallery: false,
		item: 1,
		loop: false,
		slideMargin: 0,
		controls: true,
		// adaptiveHeight: true,
		pager: true,
		// autoWidth: true
	});
	// $('#video_panels').lightGallery({
	// 	videoMaxWidth: '100%',
	// 	autoPlay: true,
	// 	controls: false,
	// 	counter: false,
	// 	download: false,
	// }); 
	
	// $('#main_video-video').lightGallery({
	// 	videoMaxWidth: '100%',
	// 	autoPlay: true,
	// 	controls: false,
	// 	counter: false,
	// 	download: false,
	// }); 
});


//CALLBACK VALIDATION

$(function($){
	if(document.getElementById('tel')){
		// console.log('exist');
		$("#tel").mask("+380 (99) 999 - 99 - 99", {completed:function(){checkTelValidity()}});
	}
 });
 function checkTelValidity(){
	var tel = document.getElementById('tel');
	var telBtn = document.getElementById('tel-btn');
	// telBtn.setAttribute('disabled', 'disabled');
	
	tel.checkValidity();
	// console.log(tel.checkValidity());
	// console.log(tel.value);
	// if(tel.value == '+380 (__) ___ - __ - __'){
	// 	console.log('empty');
	// }
	
	if (tel.checkValidity() === false || tel.value == ""){
		// console.log('invalid');
		telBtn.setAttribute('disabled', 'disabled');
	   }
	else if (tel.checkValidity() === true){
		// console.log('valid');
		telBtn.removeAttribute('disabled', 'disabled');
	   }
	//    telBtn.setAttribute('disabled', 'disabled');
	
 }
 $(".form_callback").trigger('reset');

// END OF CALLBACK VALIDATION

// SHOW HIDE THE adjusting-plate BLOCK BY CLICKIN CHECKBOX
function toggleCheckbox() {
	var div = document.getElementById('adjusting-plate');
	if(this.checked)
	{
	  div.style.display = 'inline-block';
	  document.getElementById('furnitura_chars_price_add').style.display = 'inline-block';
	  document.getElementById('furnitura_chars_price').style.display = 'none';
	  
	}
	else{
	  div.style.display = 'none';
	  document.getElementById('furnitura_chars_price_add').style.display = 'none';
	  document.getElementById('furnitura_chars_price').style.display = 'inline-block';
	  
	}
}

if(document.getElementById('adjusting-plate_checkbox')){
	document.getElementById('adjusting-plate_checkbox').onchange = toggleCheckbox;
}
// END OF SHOW HIDE THE adjusting-plate BLOCK BY CLICKIN CHECKBOX


// SLIDER ON FURNITURA-SET PAGE
$(document).ready(function() {
		var sliderFur = $('#fur_ben').lightSlider({
		loop:true,
		item: 1,
		slideMove: 1,
		keyPress: true,
		controls: false,
		pager: false,
		onSliderLoad: function() {
				$('#fur_ben').removeClass('cS-hidden');
		},
		onBeforeSlide: function (el) {
			$('div.fur_pager').removeClass('fur_pager_active');
			$('#fur_pager'+el.getCurrentSlideCount()).addClass('fur_pager_active');
		},
		}); 
		$('#goToPrevSlide').on('click', function () {
			sliderFur.goToPrevSlide();
		});
		$('#goToNextSlide').on('click', function () {
			sliderFur.goToNextSlide();
		});
		$('#fur_pager1').on('click', function () {
			sliderFur.goToSlide(1);
		});
		$('#fur_pager2').on('click', function () {
			sliderFur.goToSlide(2);
		});	
		$('#fur_pager3').on('click', function () {
			sliderFur.goToSlide(3);
		});
});
// END OF SLIDER ON FURNITURA-SET PAGE


// SLIDER AND GALLERY FOR FEEDBACK SECTION
$(document).ready(function() {
	var sliderFeedback = $('#feedbacksl').lightSlider({
	loop:true,
	item: 1,
	slideMove: 1,
	keyPress: true,
	controls: false,
	pager: false,
	responsive : [
		{
			breakpoint: 768,
			settings:{
				pager: true,					
			}
		},
	],
	onBeforeSlide: function (el) {
		$('#current').text(el.getCurrentSlideCount());
	},
	onSliderLoad: function() {
			$('#feedbacksl').removeClass('cS-hidden');
			$('#total').text(sliderFeedback.getTotalSlideCount());
	},
	});
	$('#goToPrevSlideFeedback').on('click', function () {
		sliderFeedback.goToPrevSlide();
	});
	$('#goToNextSlideFeedback').on('click', function () {
		sliderFeedback.goToNextSlide();
	});
	$('.feedbacklg').lightGallery({
		escKeyescKey: true,
		mousewheel: false,
		download: false,
	});
});
// END OF SLIDER AND GALLERY FOR FEEDBACK SECTION

//TOOGLE BUTTONS MINI-MAXI ON PAGE AUTOMATICA-CARD

function maximize(){
	
		if($('#maxi').is(':checked')){
			$('.maxi').css('visibility', 'visible');
		}else{
			$('.maxi').css('visibility', 'hidden');
		}
};

//CALLBACK POPUP

$( document ).ready(function(){
	checkTelValidity();
	if('#callback-popup'){
		hidePopup()
	}
})
function hidePopup(){
	$('#callback-popup').hide(250,'swing');
	hideModal();
	$('#tel-btn').attr('disabled', 'disabled');
}
function showPopup(){
	$('#callback-popup').show(250,'swing');
}


//END OF CALLBACK POPUP

//CALLBACK SUBMIT (AJAX)

$('#callback').bind('submit',function(e) {
	e.preventDefault(); 
	//here would be code

	//PLEASE DON'T FORGET TO ADD RESET ON 200!!!
	//ASK ABOUT ADDING ERROR ON 500
});

//END OF CALLBACK SUBMIT (AJAX)

//CALLBACK VALIDATION

$(function($){
	// $('#commentName').smartValidity({
	// 	btn: 'comment_btn',
    //     label:'commentName_lab'
	// });
	if(document.getElementById('tel')){
		// console.log('exist');
		$("#tel").mask("+380 (99) 999 - 99 - 99", {completed:function(){checkTelValidity()}});		
	}
 });
 function checkTelValidity(){
	var tel = document.getElementById('tel');
	var telBtn = document.getElementById('tel-btn');
	var telLabel = document.getElementById('tel_label');

	$("#tel").smartValidity({
		btn: 'tel-btn',
        label:'tel_label',
		errorstyle: { "text-align": "right", "padding-right": "20px" }
	});
	
	if (telBtn  !== undefined && telBtn !== null){
		telBtn.setAttribute( "disabled", "disabled" );
		
		if (tel.checkValidity() === false || tel.value == ""){
			telBtn.setAttribute( "disabled", "disabled" );
		}
		else if (tel.checkValidity() === true){
			telBtn.removeAttribute( "disabled", "disabled" );
		}
	}
}

 //-->>> this doesn't work while we don't have submit action (I prevented default)
 function resetForm(){
	 $("#callback").trigger('reset');
	 $("#tel").css('text-align', 'center').css('padding-right','0');	 
}

// END OF CALLBACK VALIDATION

//POPUP MODAL Window

function superPopup(){
	$('#overlay')
		.addClass('modal-overlay');
	$('#popup-callback-start')
		.addClass('modal');
	$('#callback-popup')
		.addClass('modal-answer');
	$('#modal-close').click(function(){
		hideModal()
	});
	$('body')
		.css('overflow', 'hidden');
}
function hideModal(){
	$('#popup-callback-start')
		.removeClass('modal');
	$('#callback-popup')
		.removeClass('modal-answer');
	$('#overlay')
		.removeClass('modal-overlay');
	$('body')
		.css('overflow', 'auto');
};

//END OF POPUP


//DROPZONE

function changeMsg(){
	document.getElementById("msgText").innerHTML="Вы можете перетянуть";
	document.getElementById("msgQuontity").innerHTML="ещё 2 фотографии";
	document.getElementsByClassName("dz-message")[0].style.opacity = '0';
}
function changeMsg1(){
	document.getElementById("msgText").innerHTML="Перетяните сюда";
	document.getElementById("msgQuontity").innerHTML="до 3 фотографий";
	document.getElementsByClassName("dz-message")[0].style.opacity = '0';
}
function changeMsg2(){
	document.getElementById("msgText").innerHTML="Вы можете перетянуть";
	document.getElementById("msgQuontity").innerHTML="ещё 1 фотографию";
	document.getElementsByClassName("dz-message")[0].style.opacity = '0';
}
function changeMsg3(){
	document.getElementById("msgText").innerHTML="Перетяните сюда";
	document.getElementById("msgQuontity").innerHTML="до 3 фотографий";
	document.getElementsByClassName("dz-message")[0].style.opacity = '0.7';	
}
  //END OF DROPZONE

  //VALIDATION ON COMMENT PAGE

  if($('.comment-form').length > 0){
	var inputs = $('#commentName, #commentEmail, #commentProducts, #commentText');
	var commentBtn = $('#comment_btn');
	function checkCommentValidity(){
	if(commentBtn != undefined){
	// commentBtn.prop( "disabled", true );

		$("#commentEmail").smartValidity({
			btn: 'comment-btn',
			label:'commentEmail-lab',
			startBorder: 'rgb(120,120,123)',
			startText: 'Email',
			errorText:'Введите в формате mail@mail.com'
		});
		$("#commentText").smartValidity({
			btn: 'comment-btn',
			label:'commentText-lab',
			startBorder: 'rgb(120,120,123)',
			startText: 'Сообщение',
			errorText:'Сообщение должно содержать больше 10 символов'
		});

		for (i=0; i <inputs.length; i++){
			inputs[i].checkValidity();
			
		}
		if(inputs[0].checkValidity() === true && inputs[1].checkValidity() === true &&inputs[2].checkValidity() === true &&inputs[3].checkValidity() === true){
			commentBtn.prop( "disabled", false );
			return true;
		} else{
			commentBtn.prop( "disabled", true );
			return false;
		}
	}
  }

  for (i=0; i <inputs.length; i++){
  	inputs[i].onkeydown = function(){
			checkCommentValidity();
		}
	inputs[i].onchange = function(){
			checkCommentValidity();
		}	
	}
}

	  //>>>end of labels on comment page
	  //>>>popup on comment page


function showCommentThanx(){
	$('#thankyou-hide').css('display', 'none');
	// $('#thankyou-hide').hide(200, 'swing');
	$('#thankyou-popup').show(450,'swing');
}
 
$('#comment-form').bind('submit',function(e) {
	e.preventDefault();
	$("#comment-form").trigger('reset'); 
	//here would be code

	//PLEASE DON'T FORGET TO ADD RESET ON 200!!!
	//ASK ABOUT ADDING ERROR ON 500
});
  //END OF VALIDATION ON COMMENT PAGE

 //CERTIFICATES SCROLL OR CAROUSEL

function calcWidth(){
    if ($(window).width() < '1024'){
		if($('#lightSlider_certificates').length>0){
			$('#lightSlider_certificates').lightSlider().destroy();
		}
		$('.slides').removeAttr('id').attr('id', 'main-page_certificates_scroll-wrapper');
		$('.main-page_certificates_slider').css('display', 'none');
    } else {
		$('.main-page_certificates_slider').css('display', 'block');
		$('.slides').attr('id', 'lightSlider_certificates');
			//Sertificates Carousel
		$('#lightSlider_certificates').lightSlider({
			item:6,
			loop:false,
			easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
			speed:600,
			controls: false,
			pager: false,
			slideMargin: 0,
			responsive: [
				{
					breakpoint:1400,
					settings: {
						item:5
						}
				},
				{
					breakpoint:1200,
					settings: {
						item:4
					}
				}	
			]
		});
	}
}
$(window).resize(calcWidth);
$(document).ready(calcWidth);

//END OF CERTIFICATES SCROLL OR CAROUSEL

//FORM ON PAGE AUTOMATICA
if($('#automatica-form').length > 0){
	var radio = $('#mini, #maxi');
	var input = $('#automatica-width');
	var commentBtn = $('#automatica-btn');
	function checkInput(){
		if (input.val() !== ''){
			commentBtn.prop("disabled", false);
		} else {
			commentBtn.prop('disabled', true);
		}
	}
	function changePrice(){
		if(radio[0].checked){
			$('#for-mini').css('display','inline');
			$('#for-maxi').css('display','none');
		} else if(radio[1].checked){
			$('#for-mini').css('display','none');
			$('#for-maxi').css('display','inline');
		}
	}
	$(document).ready(function(){
		checkInput();
		changePrice();
		maximize();
	});
	radio.change(function(){
		changePrice();
		maximize();
	});
}
//END OF FORM ON PAGE AUTOMATICA


//BUY BUTTON

$(".buy").click(function(){   
	var currentButton = $(this); 
	var productId = currentButton.attr('data-id');
    // console.log(productId);
    var params = {
        id: productId,
	}
    $.post(templateUrl+'/cart-controller.php', params, function(data){
		$('.shopping-cart_number').html(data);
		// console.log(data);
    })
});

function countSum(){
	if($('.shopping-cart_item-single_price-total').length > 0){
		var totalPrice = 0;
		$('.shopping-cart_item-single_price-total').each(function(){
			totalPrice += parseInt($(this).html());
		});
		$('.shopping-cart_price-sum > p > span').html(totalPrice.toLocaleString('ru'));
	} else{
		$('.shopping-cart_price-sum > p > span').html(0);
	}
}
countSum();

//delete product from cart
$(".delete-product").click(function(){   
	var currentDeleteButton = $(this); 
	var deleteProductId = currentDeleteButton.attr('data-id');
    var params = {
        id_to_delete: deleteProductId,
	}
    $.post(templateUrl+'/cart-controller.php', params, function(data){
		$('.shopping-cart_number').html(data);
	});
	currentDeleteButton.parent().remove();
	countSum();
});

//change product quantity from cart

$('.shopping-cart_item-single_number').change(function(){
	var new_quantity = $(this).val();
	var changeProductQuantity = $(this).attr('data-id');
	var params = {
		id_to_change: changeProductQuantity,
		new_quantity: new_quantity
	}
	$.post(templateUrl+'/cart-controller.php', params, function(data){
		$('.shopping-cart_number').html(data);
	});
	if(new_quantity == 0){
		$(this).parent().parent().parent().remove();
	}
	var newSum = parseInt($(this).parent().next().html()) * new_quantity;
	// console.log(parseInt(newSum));
	$(this).parent().next().next().html(newSum + ' грн');
	countSum();
})