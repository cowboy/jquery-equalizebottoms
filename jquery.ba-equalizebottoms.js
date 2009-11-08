/*!
 * jQuery equalizeBottoms - v1.3 - 4/4/2009
 * http://benalman.com/projects/jquery-equalizebottoms-plugin/
 * 
 * Copyright (c) 2009 "Cowboy" Ben Alman
 * Licensed under the MIT license
 * http://benalman.com/about/license/
 */

// Script: jQuery equalizeBottoms
//
// *Version: 1.3, Date: 4/4/2009*
// 
// Project Home - http://benalman.com/projects/jquery-equalizebottoms-plugin/
// GitHub       - http://github.com/cowboy/jquery-equalizebottoms/
// Source       - http://github.com/cowboy/jquery-equalizebottoms/raw/master/jquery.ba-equalizebottoms.js
// (Minified)   - http://github.com/cowboy/jquery-equalizebottoms/raw/master/jquery.ba-equalizebottoms.min.js (1.1kb)
// 
// About: License
// 
// Copyright (c) 2009 "Cowboy" Ben Alman,
// Licensed under the MIT license.
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
// jQuery Versions - 1.3.2
// Browsers Tested - Internet Explorer 6-8, Firefox 3, Safari 3-4, Chrome, Opera 9.
// 
// About: Release History
// 
// 1.3 - (4/4/2009) Initial release

(function($) {
  '$:nomunge'; // Used by YUI compressor.
  
  // Setting this should help the code minify smaller
  var equalizeBottoms = 'equalizeBottoms',
    
    // Store all polling loops so they can be managed.
    polls = [];
  
  // Method: jQuery.fn.equalizeBottoms
  // 
  // Equalize the bottoms of all selected elements. If no delay is specified,
  // equalize the bottoms once, synchronously. If delay is specified, start a
  // polling loop to periodically equalize the bottoms of these elements. If
  // destroy is true, stop any polling loops including the selected elements.
  // 
  // Note: if more than one element is selected, and the first element belongs
  // to a group of elements in an already-existing polling loop, only elements'
  // bottoms in that element's polling group will be equalized.
  // 
  // Usage:
  // 
  // > jQuery('selector').equalizeBottoms( [ delay | destroy ] );
  // 
  // Arguments:
  // 
  //  delay - (Number) Zero-or-greater numeric polling loop delay in
  //    milliseconds. Note: No two polling groups may share elements; if a new
  //    polling group contains an element from an existing group, the existing
  //    group's polling loop will be canceled.
  //  destroy - (Boolean) If true, cancels the polling loop of all groups that
  //    contain the selected element or elements.
  // 
  // Returns:
  // 
  //  (jQuery) The initial jQuery collection of elements.  
  
  $.fn[equalizeBottoms] = function( arg0 ) {
    
    if ( arg0 === true ) {
      this.each(function() {
        clear_poll( $(this).data( equalizeBottoms ) );
      });
      
    } else if ( typeof arg0 === 'number' ) {
      start_poll( this, arg0 < 0 ? 0 : arg0 );
      
    } else {
      equalize( this, true );
    }
    
    return this;
  };
  
  // Actually perform the bottom equalization.
  
  function equalize( elems, check_stored_polls ) {
    var poll,
      bottom = 0;
    
    // Equalize all elements in polling group if one exists.
    if ( check_stored_polls ) {
      poll = polls[ elems.data( equalizeBottoms ) - 1 ];
      if ( poll && poll.elems ) {
        elems = poll.elems;
      }
    }
    
    elems
      // Reset height first,
      .css({ height: 'auto' })
      
      // then get the bottom-most bottom,
      .each(function(){
        var that = $(this);
        bottom = Math.max( bottom, that.offset().top + that.height() );
      })
      
      // then update all bottoms.
      .each(function(){
        var that = $(this);
        that.height( bottom - that.offset().top );
      });
  };
  
  // Clear an existing polling loop, if it exists.
  
  function clear_poll( id ) {
    var poll = typeof id === 'number' && polls[id - 1];
    
    if ( poll && poll.timeout_id ) {
      clearTimeout( poll.timeout_id );
      
      // Clean up loose ends.
      poll.elems.removeData( equalizeBottoms );
      poll.timeout_id = null;
      poll.elems = null;
    }
  };
  
  // Start a new polling loop.
  
  function start_poll( elems, delay ) {
    var poll = { timeout_id: null, elems: elems },
      
      // Initialize the array of elements for this polling group.
      items = $.map( elems, function(v,i){
        var elem = $(v),
          id = elem.data( equalizeBottoms );
        
        // If this element is part of a pre-existing polling group, destroy it.
        id && clear_poll( id );
        
        return { elem: elem, bottom: null, html: null };
      });
    
    // Keep track of what polling group each element belongs to.
    elems.data( equalizeBottoms, polls.push(poll) );
    
    (function(){
      var changed = false;
      
      // Check to see if an update is needed.
      $.each(items, function(i,v){
        var bottom = v.elem.offset().top + v.elem.height(),
          html = v.elem.html();
        
        if ( bottom !== v.bottom || html !== v.html ) {
          v.bottom = bottom;
          v.html = html;
          changed = true;
        }
      });
      
      // Update only if needed.
      changed && equalize( elems );
      
      // Check again after a delay.
      poll.timeout_id = setTimeout( arguments.callee, delay );
    })();
  };
  
})(jQuery);
