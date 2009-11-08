<?PHP

include "Examples/shell.php";

$shell['title1'] = "Equalize Bottoms";
$shell['link1']  = "/projects/equalize-bottoms/";

$shell['title2'] = "Code Sample";

$shell['h2'] = 'Equalize the bottoms of any number of block elements. Make your columns look delightful and fresh!';

// ========================================================================== //

ob_start();
?>
  <a href="/docs/code/files/javascript/jquery/jquery-ba-equalize-bottoms-js.html">Documentation</a>
  <span class="divider">|</span>
  <a href="/the-plugin-page/">Plugin page</a>
  <span class="divider">|</span>
  <a href="/code/javascript/jquery/jquery.ba-equalize-bottoms.js">Source</a>
<?
$shell['h3'] = ob_get_contents();
ob_end_clean();

// ========================================================================== //

ob_start();
?>
  <pre class="brush:js">$('.column > :last-child').equalizeBottoms();</pre>
  
  <div id="nav">
    <p>Test links:</p>
    <ul></ul>
  </div>
  
  <div id="test">
    <div id="column-1" class="column">
      <div>
        This is the first div in column 1
      </div>
      <div>
        This is the second div in column 1. Something else and then more and more and more and more and more and more and more and more and more
      </div>
      <div>
        <strong>This is the last div in column 1, the div whose bottom shall be equalized</strong>
      </div>
    </div>
    <div id="column-2" class="column">
      <div>
        This is the first div in column 2
      </div>
      <div id="col2-div">
        This is the second div in column 2. Something else and then more and more and more
      </div>
      <div>
        <strong>This is the last div in column 2, the div whose bottom shall be equalized</strong>
      </div>
    </div>
    <div id="column-3" class="column">
      <div>
        This is the first div in column 3
      </div>
      <div>
        This is the second div in column 2. Something else and then more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more
      </div>
      <div>
        <strong>This is the last div in column 3, the div whose bottom shall be equalized</strong>
      </div>
    </div>
  </div>
<?
$shell['html_body'] = ob_get_contents();
ob_end_clean();

// ========================================================================== //

ob_start();
?>
<script type="text/javascript" src="/code/javascript/jquery/jquery.ba-equalize-bottoms.js"></script>
<script type="text/javascript" language="javascript">

$(function(){
  
  $('.column > :last-child')
    .equalizeBottoms( 100 )
    .addClass( 'hilight' );
  
  
  var nav = $('#nav ul');
  
  $('<li/>')
    .appendTo( nav )
    .append( 'column 1: ' )
    .append( '<a href="#">add text<\/a>' )
    .find( 'a:last' )
      .click(function(){
        $('.column:first > :last-child')
          .append('<span> This is some sample text that should hopefully wrap!<\/span>')
          
          .equalizeBottoms();     // call manually if you can, it'll update faster
                                  // also, since element is part of a polling group, you only need to
                                  // call .equalizeBottoms() on one element in that group to equalize all
        return false;
      })
      .end()
    .append( ' <span class="divider">|<\/span> ' )
    .append('<a href="#">remove text<\/a>')
    .find('a:last')
      .click(function(){
        $('.column:first > :last-child').each(function(){
          $(this)
            .find('span:last')
              .remove()
            .end()
            
            .equalizeBottoms();   // call manually if you can, it'll update faster
                                  // also, since element is part of a polling group, you only need to
                                  // call .equalizeBottoms() on one element in that group to equalize all
        });
        return false;
      });
    
  $('<li/>')
    .appendTo( nav )
    .append('column 2: ')
    .append('<a href="#">add text<\/a>')
    .find('a:last')
      .click(function(){
        $('#col2-div')
          .append('<span> This is some sample text that should hopefully wrap!<\/span>')
          .siblings(':last')
            
            .equalizeBottoms();   // call manually if you can, it'll update faster
                                  // also, since element is part of a polling group, you only need to
                                  // call .equalizeBottoms() on one element in that group to equalize all
        
        return false;
      })
      .end()
    .append(' <span class="divider">|<\/span> ')
    .append('<a href="#">remove text<\/a>')
    .find('a:last')
      .click(function(){
        $('#col2-div').each(function(){
          $(this)
            .find('span:last')
              .remove()
            .end()
            .siblings(':last')
              
              .equalizeBottoms(); // call manually if you can, it'll update faster
                                  // also, since element is part of a polling group, you only need to
                                  // call .equalizeBottoms() on one element in that group to equalize all
        });
        
        return false;
      });
    
  $('<li/>')
    .appendTo( nav )
    .append('column 3: ')
    .append('<a href="#">add text<\/a>')
    .find('a:last')
      .click(function(){
        $('.column:last > :last-child')
          .append('<span> This is some sample text that should hopefully wrap!<\/span>')
          
          .equalizeBottoms();     // call manually if you can, it'll update faster
                                  // also, since element is part of a polling group, you only need to
                                  // call .equalizeBottoms() on one element in that group to equalize all
        
        return false;
      })
      .end()
    .append(' <span class="divider">|<\/span> ')
    .append('<a href="#">remove text<\/a>')
    .find('a:last')
      .click(function(){
        $('.column:last > :last-child').each(function(){
          $(this)
            .find('span:last')
              .remove()
            .end()
            
            .equalizeBottoms();   // call manually if you can, it'll update faster
                                  // also, since element is part of a polling group, you only need to
                                  // call .equalizeBottoms() on one element in that group to equalize all
        });
        return false;
      });
  
  $('<li/>')
    .appendTo( nav )
    .append('polling loop: ')
    .append('<a href="#">cols 1+2<\/a>')
    .find('a:last')
      .click(function(){
        
        $('#column-1 > :last-child, #column-2 > :last-child').equalizeBottoms( 100 );
        
        return false;
      })
      .end()
    .append(' <span class="divider">|<\/span> ')
    .append('<a href="#">cols 1+2+3<\/a>')
    .find('a:last')
      .click(function(){
      
        $('.column > :last-child').equalizeBottoms( 100 );
        
        return false;
      });
  
  SyntaxHighlighter.highlight();
});

</script>
<style type="text/css" title="text/css">

/*
bg: #FDEBDC
bg1: #FFD6AF
bg2: #FFAB59
orange: #FF7F00
brown: #913D00
lt. brown: #C4884F
*/

pre {
  width: 20em;
}

#page {
  width: 700px;
}

#test {
  float: left;
  width: 620px;
  border: 1px dashed #913D00;
  padding: 6px 0 0 6px;
}

.column {
  float: left;
  margin-right: 6px;
  width: 200px;
  border: 0px solid #913D00;
}

.column div {
  background-color: #FFD1A5;
  margin-bottom: 6px;
  border: 2px solid #913D00;
  padding: 6px;
}

.hilight {
  background-color: #FFAB59 !important;
}

#nav p {
  margin-bottom: 0;
}

#nav ul {
  margin-top: 0;
  margin-bottom: 1em;
}

</style>
<?
$shell['html_head'] = ob_get_contents();
ob_end_clean();

// ========================================================================== //

draw_shell();

?>