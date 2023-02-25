$(function () {
  "use strict";

  //------- fixed navbar --------//  
  $(window).scroll(function () {
    var sticky = $('.header_area'),
      scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
  });

});

window.setTimeout(function() {
  $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
  });
}, 4000);

