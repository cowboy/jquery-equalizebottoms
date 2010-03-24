<?PHP

include "../index.php";

$shell['title3'] = "equalizeBottoms";

$shell['h2'] = 'Equalize the bottoms of any number of block elements. Make your columns look delightful and fresh!';

// ========================================================================== //
// SCRIPT
// ========================================================================== //

ob_start();
?>
$(function(){
  
  // This one function perform multiple equalizeBottoms calls.
  function equalize(){
    
    // For each dashed-border box, equalize bottoms of the last div in each column.
    $('.box').each(function(){
      $(this).find('.column > :last-child').equalizeBottoms();
    });
    
    // Equalize bottoms of both dashed-border boxes.
    $('.box').equalizeBottoms();
  };
  
  // Bind a custom 'equalize' event to document, then trigger it immediately.
  $(document).bind( 'equalize', equalize ).trigger( 'equalize' );
  
  // Bind click handlers for this example.
  $('a.add').click(function(){
    var txt = 'This is some sample text that should hopefully wrap!';
    $(this).closest( 'div' ).append( '<em> ' + txt + ' <\/em>' );
    
    // Trigger equalizeBottom (the event will bubble).
    $(this).trigger( 'equalize' );
    
    // Prevent default click action.
    return false;
  });
  
  $('a.remove').click(function(){
    $(this).closest( 'div' ).find( 'em:last' ).remove();
    
    // Trigger equalizeBottom (the event will bubble).
    $(this).trigger( 'equalize' );
    
    // Prevent default click action.
    return false;
  });
  
});
<?
$shell['script'] = ob_get_contents();
ob_end_clean();

// ========================================================================== //
// HTML HEAD ADDITIONAL
// ========================================================================== //

ob_start();
?>
<script type="text/javascript" src="../../jquery.ba-equalizebottoms.js"></script>
<script type="text/javascript" language="javascript">

<?= $shell['script']; ?>

$(function(){
  
  // Syntax highlighter.
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

#page {
  width: 700px;
}

.box {
  float: left;
  width: 335px;
  border: 1px dashed #913D00;
  padding: 6px 0 0 6px;
  margin-right: 6px;
}

.box-header {
  margin: 0 6px 6px 0;
  text-align: center;
}

.column {
  float: left;
  _display: inline;
  margin-right: 6px;
  width: 161px;
  border: 0px solid #913D00;
}

.column div {
  background-color: #FFD1A5;
  margin-bottom: 6px;
  border: 2px solid #913D00;
  padding: 6px;
}

.highlight {
  background-color: #FFAB59 !important;
}

#b { padding-top: 20px; }
#d { padding-bottom: 20px; }

.nav {
  display: block;
  margin: 0 0 0.5em;
  text-align: center;
  color: #C4884F;
  border: 1px solid #C4884F;
  background: #fff;
}

.nav a {
  text-decoration: none;
}

.nav a:hover {
  text-decoration: underline;
}

.box em { _font-style: normal; } /* ie6 continues to blow my mind */

</style>
<?
$shell['html_head'] = ob_get_contents();
ob_end_clean();

// ========================================================================== //
// HTML BODY
// ========================================================================== //

ob_start();
?>
<?= $shell['donate'] ?>

<p>
  With <a href="http://benalman.com/projects/jquery-equalizebottoms-plugin/">jQuery equalizeBottoms</a> you can
  "equalize" the bottoms of multiple elements, making columns heights even, even when CSS refuses to help.
  Keep in mind that you should still do everything you can in CSS first.. but then, after you've exhausted all your
  other options, this plugin may help!
</p>
<p>
  Click the "add text" and "remove text" buttons below to see jQuery equalizeBottoms in action!
</p>

<h3>An example</h3>

<div class="box">
  <div class="box-header">
    <strong>This is box 1</strong>
  </div>
  <div class="column">
    <div>
      This is the first div in column 1
    </div>
    <div>
      This is the second div in column 1. Something else and then more and more and more and more and more and more and more and more and more
    </div>
    <div class="highlight" id="a">
      <span class="nav"><a href="#" class="add">add text</a> | <a href="#" class="remove">remove text</a></span>
      <strong>This is the last div in column 1, the div whose bottom shall be equalized</strong>
    </div>
  </div>
  <div class="column">
    <div>
      This is the first div in column 2
    </div>
    <div id="col2-div">
      <span class="nav"><a href="#" class="add">add text</a> | <a href="#" class="remove">remove text</a></span>
      This is the second div in column 2. Something else and then more and more and more
    </div>
    <div class="highlight" id="b">
      <strong>This is the last div in column 2, the div whose bottom shall be equalized (note the top padding)</strong>
    </div>
  </div>
</div>
<div class="box">
  <div class="box-header">
    <strong>This is box 2</strong>
  </div>
  <div class="column">
    <div>
      This is the first div in column 3
    </div>
    <div>
      This is the second div in column 3. Something else and then more and more and more and more and more and more and more and more and more
    </div>
    <div class="highlight" id="c">
      <span class="nav"><a href="#" class="add">add text</a> | <a href="#" class="remove">remove text</a></span>
      <strong>This is the last div in column 3, the div whose bottom shall be equalized</strong>
    </div>
  </div>
  <div class="column">
    <div>
      <span class="nav"><a href="#" class="add">add text</a> | <a href="#" class="remove">remove text</a></span>
      This is the first div in column 4
    </div>
    <div>
      This is the second div in column 4. Something else and then more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more and more
    </div>
    <div class="highlight" id="d">
      <strong>This is the last div in column 4, the div whose bottom shall be equalized (note the bottom padding)</strong>
    </div>
  </div>
</div>

<div style="clear:both"></div>

<h3>The code</h3>

<p>
  Note that jQuery custom events are used in this example. You could just as easily remove all the custom
  events code, just calling <code>equalize()</code> right after it is defined, then again inside each click handler
  function, but that's up to you. Also note that if you don't have the luxury of knowing when
  the element heights may change, use the <a href="http://benalman.com/projects/jquery-dotimeout-plugin/">jQuery doTimeout</a>
  plugin to set up a polling loop or to debounce events like window.onresize.
</p>

<pre class="brush:js">
<?= htmlspecialchars( $shell['script'] ); ?>
</pre>

<?
$shell['html_body'] = ob_get_contents();
ob_end_clean();

// ========================================================================== //
// DRAW SHELL
// ========================================================================== //

draw_shell();

?>
