(function($) {
"use strict";

/*------------------------------------------------------------------
[Table of contents]

1. CUSTOM PRE DEFINE FUNCTION
2. MEANMENU INIT JS
3. DROPDOWN MENU RIGHT SIDE CUT FIXED

-------------------------------------------------------------------*/



/*--------------------------------------------------------------
1. CUSTOM PRE DEFINE FUNCTION
------------------------------------------------------------*/
/* is_exist() */
jQuery.fn.is_exist = function(){
  return this.length;
}

$(function(){


/*--------------------------------------------------------------
3. DROPDOWN MENU RIGHT SIDE CUT FIXED
--------------------------------------------------------------*/
$("#primary-menu li").on('mouseenter mouseleave', function (e) {
  if ($('ul', this).length) {
    // alert('55');
      var elm = $('ul.sub-menu', this);
      var off = elm.offset();
      var l = off.left;
      var w = elm.width();
      var docH = $(window).height();
      var docW = $(window).width();

      var isEntirelyVisible = (l + w <= docW);

      if (!isEntirelyVisible) {
          $(this).addClass('edge-submenu');
      } else {
          $(this).removeClass('edge-submenu');
      }
  }
});


$(".landex-menu-close").on('click', function(){
  $('#site-header-menu').removeClass('toggled-on');
});


});/*End document ready*/


$(window).load(function () {
  if ($.fn.masonry) {
    $('.blog-content-row .posts-row').masonry({
        // options
        itemSelector: '.posts-row>div',

    });
}
})


})(jQuery);






