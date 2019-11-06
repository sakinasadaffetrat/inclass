//FANCYBOX (and our mobile menu)
$(function() {

  //TRIGGER THE MOBILE MENU
  $('.trigger').on('click', function(e) {
    e.preventDefault();
    $('body').toggleClass('menu-is-open');
  });

});