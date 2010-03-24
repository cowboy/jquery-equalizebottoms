/*!
 * jQuery equalizeBottoms - v1.5 - 3/23/2010
 * http://benalman.com/projects/jquery-equalizebottoms-plugin/
 * 
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */

// Script: jQuery equalizeBottoms
//
// *Version: 1.5, Date: 3/23/2010*
// 
// Project Home - http://benalman.com/projects/jquery-equalizebottoms-plugin/
// GitHub       - http://github.com/cowboy/jquery-equalizebottoms/
// Source       - http://github.com/cowboy/jquery-equalizebottoms/raw/master/jquery.ba-equalizebottoms.js
// (Minified)   - http://github.com/cowboy/jquery-equalizebottoms/raw/master/jquery.ba-equalizebottoms.min.js (0.5kb)
// 
// About: License
// 
// Copyright (c) 2010 "Cowboy" Ben Alman,
// Dual licensed under the MIT and GPL licenses.
// http://benalman.com/about/license/
// 
// About: Examples
// 
// This working example, complete with fully commented code, illustrates a few
// ways in which this plugin can be used.
// 
// Equalize Bottoms - http://benalman.com/code/projects/jquery-equalizebottoms/examples/equalizebottoms/
// 
// About: Support and Testing
// 
// Information about what version or versions of jQuery this plugin has been
// tested with and what browsers it has been tested in.
// 
// jQuery Versions - 1.3.2, 1.4.2
// Browsers Tested - Internet Explorer 6-8, Firefox 2-3.6, Safari 3-4, Chrome, Opera 9.6-10.1.
// 
// About: Release History
// 
// 1.5 - (3/23/2010) Changed .height measurement to .outerHeight to take
//       padding and border into consideration.
// 1.4 - (11/7/2009) Removed polling functionality. If you need polling, use
//       in combination with jQuery doTimeout.
// 1.3 - (4/4/2009) Initial release

(function($) {
  '$:nomunge'; // Used by YUI compressor.
  
  // Method: jQuery.fn.equalizeBottoms
  // 
  // Equalize the bottoms of all selected elements.
  // 
  // Usage:
  // 
  // > jQuery('selector').equalizeBottoms( [ bottom ] );
  // 
  // Arguments:
  // 
  //  bottom - (Number) An optional bottom y position to force selected element
  //    bottoms to. If omitted, bottom is computed automatically by measuring
  //    height of all selected elements and choosing the bottom-most bottom. You
  //    will probably never, ever use this.
  // 
  // Returns:
  // 
  //  (jQuery) The initial jQuery collection of elements.
  
  $.fn.equalizeBottoms = function( bottom ) {
    
    if ( isNaN( bottom ) ) {
      bottom = 0;
      
      // Reset height first, then get the bottom-most bottom.
      this.each(function(){
        var that = $(this).css({ height: 'auto' });
        bottom = Math.max( bottom, that.offset().top + that.outerHeight() );
      });
    }
    
    // Update all bottoms, taking padding and border height into consideration.
    return this.each(function(){
      var that = $(this);
      that.height( bottom - that.offset().top - that.outerHeight() + that.height() );
    });
    
  };
  
})(jQuery);
