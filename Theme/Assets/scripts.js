/********************************************

  >>> Parralax Scrolling <<<
  **
  ** URL: http://www.minimit.com/articles/lets-animate/parallax-backgrounds-with-centered-content

********************************************/
$ = jQuery;
$(document).ready(function () {

  /* detect touch */
  if ("ontouchstart" in window) {
    document.documentElement.className = document.documentElement.className + " touch";
  }
  if (!$("html").hasClass("touch")) {
    /* background fix */
    $(".parallax").css("background-attachment", "fixed");
  }

  /* fix vertical when not overflow
  call fullscreenFix() if .fullscreen content changes */
  function fullscreenFix() {
    var h = $('body').height();
    // set .fullscreen height
    $(".content-b").each(function (i) {
      if ($(this).innerHeight() > h) {
        $(this).closest(".fullscreen").addClass("overflow");
      }
    });
  }
  $(window).resize(fullscreenFix);
  fullscreenFix();

  /* resize background images */
  function backgroundResize() {
    var windowH = $(window).height();
    $(".background").each(function (i) {
      var path = $(this);
      // variables
      var contW = path.width();
      var contH = path.height();
      var imgW = path.attr("data-img-width");
      var imgH = path.attr("data-img-height");
      var ratio = imgW / imgH;
      // overflowing difference
      var diff = parseFloat(path.attr("data-diff"));
      diff = diff ? diff : 0;
      // remaining height to have fullscreen image only on parallax
      var remainingH = 0;
      if (path.hasClass("parallax") && !$("html").hasClass("touch")) {
        var maxH = contH > windowH ? contH : windowH;
        remainingH = windowH - contH;
      }
      // set img values depending on cont
      imgH = contH + remainingH + diff;
      imgW = imgH * ratio;
      // fix when too large
      if (contW > imgW) {
        imgW = contW;
        imgH = imgW / ratio;
      }
      //
      path.data("resized-imgW", imgW);
      path.data("resized-imgH", imgH);
      path.css("background-size", imgW + "px " + imgH + "px");
    });
  }
  $(window).resize(backgroundResize);
  $(window).focus(backgroundResize);
  backgroundResize();

  /* set parallax background-position */
  function parallaxPosition(e) {
    var heightWindow = $(window).height();
    var topWindow = $(window).scrollTop();
    var bottomWindow = topWindow + heightWindow;
    var currentWindow = (topWindow + bottomWindow) / 2;
    $(".parallax").each(function (i) {
      var path = $(this);
      var height = path.height();
      var top = path.offset().top;
      var bottom = top + height;
      // only when in range
      if(bottomWindow > top && topWindow < bottom) {
        var imgW = path.data("resized-imgW");
        var imgH = path.data("resized-imgH");
        // min when image touch top of window
        var min = 0;
        // max when image touch bottom of window
        var max = - imgH + heightWindow;
        // overflow changes parallax
        var overflowH = height < heightWindow ? imgH - height : imgH - heightWindow; // fix height on overflow
        top = top - overflowH;
        bottom = bottom + overflowH;
        // value with linear interpolation
        var value = min + (max - min) * (currentWindow - top) / (bottom - top);
        // set background-position
        var orizontalPosition = path.attr("data-oriz-pos");
        orizontalPosition = orizontalPosition ? orizontalPosition : "50%";
        $(this).css("background-position", orizontalPosition + " " + value + "px");
      }
    });
  }
  if (!$("html").hasClass("touch")) {
    $(window).resize(parallaxPosition);
    //$(window).focus(parallaxPosition);
    $(window).scroll(parallaxPosition);
    parallaxPosition();
  }

});



/********************************************

  >>> Audits Accordion <<<
  **
  ** Control the accordion for audits on the
  ** home page.
  **
  ** User clicks a list item from the audit
  ** types, this will find the matching
  ** description and show it while hiding
  ** the other descriptions.

********************************************/
$(document).ready(function () {

  //When user clicks an audit type
  $('.audit-types li').click(function () {

    //Set the variables
    var self = $(this),
      accordionView = self.attr('data-section-name');

    //If it is not already active
    if (!$(this).hasClass('active')) {
      //Clear the active class
      $('.audit-types li').each(function () {
        $(this).removeClass('active');
      });

      //Add the active class to the audit type
      self.addClass('active');

      //Filter the descriptions
      $('.audit-descriptions li').each(function () {
        var descriptionItem = $(this);
        //If the audit desctiption matches the clicked audit type
        if (descriptionItem.attr('name') === accordionView) {
          //Add the open class to show the item
          descriptionItem.addClass('open');
        } else {
          //Remove the open class to hide the item
          descriptionItem.removeClass('open');
        }
      });
    }
  });
});




/********************************************

  >>> Shrinking Header <<<

  ** When scroll is initiated, add a class
  ** to header telling it to "shrink". When
  ** scroll position is back at the top,
  ** remove the class.

********************************************/
$(window).scroll(function(){

  if($(document).scrollTop() > 0) {
      $('#primary_header').addClass('shrink');
    } else {
      $('#primary_header').removeClass('shrink');
      $('#shrunk_search_form').removeClass('open');
    }

});


/********************************************

  >>> Shrunken Header Search Bar <<<

  ** When the navigation is shrunken and the
  ** search icon is clicked, show the search
  ** bar inbetween the nav elements.

********************************************/
jQuery(document).ready(function() {

  function toggle_switches() {

    $get_search_bar = $('#shrunk_search_form');

    if( $get_search_bar.hasClass('open') ) {
      $('#shrunk_search_toggle .fa-search').hide();
      $('#shrunk_search_toggle .fa-chevron-up').fadeIn();
    } else {
      $('#shrunk_search_toggle .fa-chevron-up').hide();
      $('#shrunk_search_toggle .fa-search').fadeIn();
    }

  }
  toggle_switches();

  jQuery('html').click(function() {
    jQuery('#shrunk_search_form').removeClass('open');
    toggle_switches();
  });

  jQuery('#shrunk_search_form input').click(function(e) {
    e.preventDefault();
    e.stopPropagation();
  });

  jQuery('#shrunk_search_toggle .fa-search').click(function(e) {
    e.preventDefault();
    e.stopPropagation();
    jQuery('#shrunk_search_form').toggleClass('open');
    toggle_switches();
  });

//  jQuery('#shrunk_search_form button').click(function(e) {
////    e.preventDefault();
////    e.stopPropagation();
//    jQuery(this).submit();
//  });

});



/********************************************

  >>> Mobile Navigation Menu <<<

  ** Control the opening and closing of the
  ** mobile menu. Control the switching of
  ** tabs in the mobile.

********************************************/
$(document).ready(function() {

  //Open The Menu
  $('#mobile_menu_open').click(function() {
    $('#mobile_menu').addClass('open');
    document.ontouchmove = function(e){ e.preventDefault(); }
    $('html, body').css({
    overflow: 'hidden',
    height: '100%'

});
  });

  //Close The Menu
  $('#mobile_menu_close').click(function() {
    $('#mobile_menu').removeClass('open');
    document.ontouchmove = function(e){ return true; }
    $('html, body').css({
    overflow: 'auto',
    height: 'auto'

});
  });

  //Switch Navigation Tabs/Content
  $('.nav_tabs li').click(function() {
    $('.nav_tabs li').each(function() {
      $(this).removeClass('active');
    });
    $(this).addClass('active');
    $tabName = $(this).attr('data-tab');
    $('.nav_content nav').each(function() {
      if( $(this).attr('id') == $tabName ) {
        $(this).addClass('active');
      } else {
        $(this).removeClass('active');
      }
    });
  });
});



/********************************************

  >>> Vertical Accordion Menu <<<

  ** Control the opening and closing of the
  ** vertical accordion menu.

********************************************/
$(".accordionTitle").click(function() {

  if( $(this).hasClass("active") ) {

    $(".accordionTitle").removeClass("active");
    $(".accordionItemContent ").hide("active");

  } else {

    $(".accordionTitle").removeClass("active");
    $(".accordionItemContent ").hide("active");
    $(this).next(".accordionItemContent").slideToggle(460);
    $(this).toggleClass("active").next(".accordionItemContent").toggleClass("active");

  }

});



/*global jQuery */
/*!
* FitText.js 1.2
*
* Copyright 2011, Dave Rupert http://daverupert.com
* Released under the WTFPL license
* http://sam.zoy.org/wtfpl/
*
* Date: Thu May 05 14:23:00 2011 -0600
*/

(function( $ ){

  $.fn.fitText = function( kompressor, options ) {

    // Setup options
    var compressor = kompressor || 1,
        settings = $.extend({
          'minFontSize' : Number.NEGATIVE_INFINITY,
          'maxFontSize' : Number.POSITIVE_INFINITY
        }, options);

    return this.each(function(){

      // Store the object
      var $this = $(this);

      // Resizer() resizes items based on the object width divided by the compressor * 10
      var resizer = function () {
        $this.css('font-size', Math.max(Math.min($this.width() / (compressor*10), parseFloat(settings.maxFontSize)), parseFloat(settings.minFontSize)));
      };

      // Call once to set.
      resizer();

      // Call on resize. Opera debounces their resize by default.
      $(window).on('resize.fittext orientationchange.fittext', resizer);

    });

  };

})( jQuery );

jQuery("#responsive_headline").fitText(1.6);




$(document).ready(function() {
//  $el = $(this).children('img');

  function addBounce($element) {
    $element.addClass('animated').addClass('bounce');
  }
  function removeBounce($element) {
    $element.removeClass('animated').removeClass('bounce');
  }

  $('.service-cta a').hover( addBounce($(this).children('img')), removeBounce($(this).children('img')) );
});




/********************************************

  >>> Smooth Scroll Anchor Links <<<

  ** Control the scrolling when an anchor
  ** link is clicked on the page.

********************************************/
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});


/**************************************************

    >> Read More Shortcode <<

**************************************************/
jQuery(document).ready(function() {
  //Set the content area as a variable
  /* var moreContent = jQuery('.read_more_content');
  //Auto hide the hidden content by default
  var $button_text = revealButton.attr('data-expand');
  if( $button_text == "Read Less" ) {
	  moreContent.slideDown();
  }else{
		moreContent.slideUp();
  } */
});
function readMoreToggle( revealButton ) {
  var moreContent = revealButton.prev('.read_more_content');

  if( moreContent.hasClass('open') ) {
    var $button_text = revealButton.attr('data-expand');
    moreContent.slideUp().removeClass('open');
    revealButton.text($button_text);
  } else { //If the content is not showing
    var $button_text = revealButton.attr('data-contract');
    moreContent.slideDown().addClass('open');
    revealButton.text($button_text);
  }
}
jQuery('.revealContent').click(function() {
  readMoreToggle( jQuery(this) );
});

jQuery(document).ready(function() {
  jQuery('.us_button').removeClass('us_native');
});



/**************************************************

    >> Title Toggle Shortcode<<

**************************************************/
jQuery(document).ready(function() {
  function titleToggle( title_toggle_area, open_or_closed ) {
    var title_toggle_block = title_toggle_area.parent('.title_toggle_block'),
      title_toggle_title = title_toggle_block.children('.title_toggle_title'),
      title_toggle_content = title_toggle_block.children('.title_toggle_content');

    if(open_or_closed == 'open' ) {
      title_toggle_block.removeClass('closed').addClass('open');
    } else if (open_or_closed == 'closed') {
      title_toggle_block.removeClass('open').addClass('closed');
    } else {

      if( title_toggle_block.hasClass('open') ) {
        title_toggle_block.removeClass('open').addClass('closed');
      } else {
        title_toggle_block.removeClass('closed').addClass('open');
      }

    }

  }

  jQuery('.toggle_area').click(function() {
    titleToggle( jQuery(this) );
  });


  if (jQuery(window).width() < 760) {
    jQuery('#upper-footer .widget .toggle_area').each(function() {
      titleToggle( jQuery(this), 'closed' );
    });
  } else {
    jQuery('#upper-footer .widget .toggle_area').each(function() {
      titleToggle( jQuery(this), 'open' );
    });
  }

/** This code is commented to disable auto-hide of footer section on scroll in mobile view

  jQuery(window).resize(function() {
    if (jQuery(window).width() < 760) {
      jQuery('#upper-footer .widget .toggle_area').each(function() {
        titleToggle( jQuery(this), 'closed' );
      });
    } else {
      jQuery('#upper-footer .widget .toggle_area').each(function() {
        titleToggle( jQuery(this), 'open' );
      });
    }
  });

*/

});



/**************************************************

    >> Toggle Page Nav Menus <<

    > @description functions to show and hide the
      child elements of the page navigation in the
      left side menu


**************************************************/
//Add drop down menu arrow indicators for pages with children links
$("li.menu-item.menu-item-has-children").children("a").append("<span class='dropDownMenu'><i class='fa fa-chevron-down' aria-hidden='true'></i></span>");

//When click on down arrow, reveal submenu
$(".dropDownMenu").click(function(e) {
  e.preventDefault();
  $( this ).parent('a').next('.sub-menu').toggleClass('open');
});

//Set current menu items to be expanded on page load
$("li.current-menu-ancestor > a > .dropDownMenu").parent('a').next('.sub-menu').toggleClass('open');
$("li.current-menu-item > a > .dropDownMenu").parent('a').next('.sub-menu').toggleClass('open');

//$("li.menu-item-has-children > a > .dropDownMenu").parent('a').next('.sub-menu').toggleClass('open');
//$("li.current-menu-item > a > .dropDownMenu").parent('a').next('.sub-menu').toggleClass('open');




/**************************************************

    >> CSS viewport units with jQuery <<

    > @Source: http://stackoverflow.com/questions/13948713/is-there-any-cross-browser-javascript-for-making-vh-and-vw-units-work


**************************************************/
//(function( $, window ){
//
//  var $win = $(window)
//    , _css = $.fn.css;
//
//  function viewportToPixel( val ) {
//    var percent = val.match(/[\d.]+/)[0] / 100
//      , unit = val.match(/[vwh]+/)[0];
//    return (unit == 'vh' ? $win.height() : $win.width()) * percent +'px';
//  }
//
//  function parseProps( props ) {
//    var p, prop;
//    for ( p in props ) {
//      prop = props[ p ];
//      if ( /[vwh]$/.test( prop ) ) {
//        props[ p ] = viewportToPixel( prop );
//      }
//    }
//    return props;
//  }
//
//  $.fn.css = function( props ) {
//    var self = this
//      , originalArguments = arguments
//      , update = function() {
//          if ( typeof props === 'string' || props instanceof String ) {
//            if (originalArguments.length > 1) {
//              var argumentsObject = {};
//              argumentsObject[originalArguments[0]] = originalArguments[1];
//              return _css.call(self, parseProps($.extend({}, argumentsObject)));
//            } else {
//              return _css.call( self, props );
//            }
//          } else {
//            return _css.call( self, parseProps( $.extend( {}, props ) ) );
//          }
//        };
//    $win.resize( update ).resize();
//    return update();
//  };
//
//}( jQuery, window ));



/**************************************************

    >> Add View All Button To Testimonials <<

**************************************************/
jQuery(document).ready(function($) {
  $('.owl-controls.clickable .owl-prev').after('<a class="pill-button" href="http://www.polepositionmarketing.com/about-us/testimonials/">View All</a>');
});


/**************************************************

    >> Close Banner Promo <<

**************************************************/
jQuery(document).ready(function() {
    $('.close').click(function () {
        $('#sticky_footer_promo').fadeOut();
    });

});


/**************************************************

    >> Close Popups <<

**************************************************/
jQuery(document).ready(function() {
    $('.close').click(function () {
        $element = $(this).attr('data-close');
        $('#'+$element).fadeOut();
        $('body').removeClass('noscroll');
    });
});



//$('#sticky_footer_promo a.cta_button').click(function(e){
//    e.preventDefault();
//    $('.popup-overlay').fadeIn();
//    $('body').addClass('noscroll');
//});




/**************************************************

    >> Make Stoney Links Open In New Tab <<

**************************************************/
jQuery(document).ready(function() {

	$read_stoneys_book = 'http://www.polepositionmarketing.com/digital-marketing-learning-library/ebooks/best-damn-web-marketing-checklist/';
	$book_stoney_to_speak = 'http://www.polepositionmarketing.com/digital-marketing-learning-library/ebooks/best-damn-web-marketing-checklist/book-stoney/';

	$('.widget-page-navigation ul li a').each(function() {

		$list_link = $(this).attr('href');

		if($list_link == $read_stoneys_book || $list_link == $book_stoney_to_speak) {
			$(this).attr("target", "_blank");
		}

	});
});