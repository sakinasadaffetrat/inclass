/* WARNING !
    THIS PAGE USES jQuery AND FILE FUNCTIONS "functions.js"
    BE SURE TO INSERT "jQuery" and "functions.js" BEFORE USING THE SCRIPTS BELOW
*/


/**
 * jQuery
 * --------------------------------------------------------------
 * On document ready, do this...
 * Before using the code below you need to install jQuery!
 */
/*START jQuery Code*/
$(function() {

  $("#open-menu").on('click', function() {
    $("#header").addClass('menu-is-open')
  });

  $("#close-menu").on('click', function() {
    $("#header").removeClass('menu-is-open')
  }); 

});