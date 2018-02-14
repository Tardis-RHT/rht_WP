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
  $('#fur_submit').click(function() {
    event.preventDefault();
    // console.log($('#fur_material').val(), $('#fur_height').val(), $('#fur_width').val());
    var map = {};
    $(".js-array").each(function() {
        map[$(this).attr("name")] = $(this).val();
    });
    console.log(map);
    // console.log(JSON.stringify(map));


  });
  //END OF RANGE SLIDER

});