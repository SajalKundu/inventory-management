$(function() {
     'use strict'; // Start of use strict

	
    /*------------------------------------------------------------------
    Header Navigation
    ------------------------------------------------------------------*/

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('nav li a').on('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-default',
        offset: 70
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a:not(.dropdown-toggle)').click(function() {
        $('.navbar-toggle:visible').click();
    });
		
    /*------------------------------------------------------------------
    Scrool Top
    ------------------------------------------------------------------*/
	$('#scrool-top').on('click', function() {
         $('html, body').animate({
             scrollTop: 0
         }, 1200, 'easeOutQuint');
         return false;
     });
});
/*------------------------------------------------------------------
Wow animations
------------------------------------------------------------------*/
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100
      }
    );
    wow.init();
	
/*------------------------------------------------------------------
  Loader + Animation Numbers
 ------------------------------------------------------------------*/
 jQuery(window).on("load scroll", function() {
     // Loader 
     $("#loader").fadeOut("fast");
     // map zooming 	 
     $('.google-map').on('click', function() {
         $('.google-map iframe').css("pointer-events", "auto");
     });
     //Animation Numbers	 
     jQuery('.animateNumber').each(function() {
         var num = jQuery(this).attr('data-num');
         var top = jQuery(document).scrollTop() + (jQuery(window).height());
         var pos_top = jQuery(this).offset().top;
         if (top > pos_top && !jQuery(this).hasClass('active')) {
             jQuery(this).addClass('active').animateNumber({
                 number: num
             }, 2000);
         }
     });
     jQuery('.animateProcent').each(function() {
         var num = jQuery(this).attr('data-num');
         var percent_number_step = jQuery.animateNumber.numberStepFactories.append('%');
         var top = jQuery(document).scrollTop() + (jQuery(window).height());
         var pos_top = jQuery(this).offset().top;
         if (top > pos_top && !jQuery(this).hasClass('active')) {
             jQuery(this).addClass('active').animateNumber({
                 number: num,
                 numberStep: percent_number_step
             }, 2000);
             jQuery(this).css('width', num + '%');
         }
     });
});
