$(document).ready(function() {
  // DROPDOWN MENU IN FURNITURA
  /* When the user clicks on the button, 
  toggle between hiding and showing the dropdown content */
  function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
  }
  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {

      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
  // END OF DROPDOWN MENU IN FURNITURA


  // RANGE SLIDER IN FURNITURA
  var rangeSlider = function(){
    var slider = $('.range-slider'),
      range = $('.range-slider__range'),
      value = $('.range-slider__value');
    slider.each(function(){
      value.each(function(){
      var value = $(this).prev().attr('value');
      $(this).html(value);
      });
      range.on('input', function(){
      $(this).next(value).html(this.value);
      });
    });
    };
  rangeSlider();


  $('#fur_material').on('change', function() {
    $('#fur_height').removeAttr('disabled');
    // console.log( this.value );
  })
  $('#fur_height').on('change', function() {
    $('#fur_width').removeAttr('disabled');
    // console.log( this.value );
  })
  $('#fur_width').on('change', function() {
    $('#fur_submit').removeAttr('disabled');
    // console.log( this.value );
  })
  $('#fur_submit').click(function(event) {
    event.preventDefault();
    // console.log($('#fur_material').val(), $('#fur_height').val(), $('#fur_width').val());
    var map = {};
    $(".js-array").each(function() {
        map[$(this).attr("name")] = $(this).val();
    });
    console.log(map);
    var params = {
      options: map,
    } 
    $.post(templateUrl+'/furnitura-loader.php', params, function(data){
      $('.furnitura_products_wrapper').each(function(){
        $(this).remove();
      });
      $('.furnitura_products').prepend(data);
    });
    // console.log(JSON.stringify(map));


  });
  //END OF RANGE SLIDER

});

// SHOW HIDE THE adjusting-plate BLOCK BY CLICKIN CHECKBOX
if(document.getElementById('furnitura_buy')){
  var furnitura_buy = document.getElementById('furnitura_buy');
  var data_id = furnitura_buy.getAttribute('data-id');
}
function toggleCheckbox() {
  var div = document.getElementById('adjusting-plate');
	if(this.checked)
	{
	  div.style.display = 'inline-block';
	  document.getElementById('furnitura_chars_price_add').style.display = 'inline-block';
    document.getElementById('furnitura_chars_price').style.display = 'none';
    
    furnitura_buy.setAttribute('data-id', data_id + '?plate');	  
	}
	else{
	  div.style.display = 'none';
	  document.getElementById('furnitura_chars_price_add').style.display = 'none';
    document.getElementById('furnitura_chars_price').style.display = 'inline-block';
    
	  furnitura_buy.setAttribute('data-id', data_id);
  }
  console.log(data_id);
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