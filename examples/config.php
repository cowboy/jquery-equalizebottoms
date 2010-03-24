<?PHP

$shell['title1'] = "jQuery equalizeBottoms";
$shell['link1']  = "http://benalman.com/projects/jquery-equalizebottoms-plugin/";

ob_start();
?>
  <a href="http://benalman.com/projects/jquery-equalizebottoms-plugin/">Project Home</a>,
  <a href="http://benalman.com/code/projects/jquery-equalizebottoms/docs/">Documentation</a>,
  <a href="http://github.com/cowboy/jquery-equalizebottoms/">Source</a>
<?
$shell['h3'] = ob_get_contents();
ob_end_clean();

$shell['jquery'] = 'jquery-1.4.2.js';
//$shell['jquery'] = 'jquery-1.3.2.js';

$shell['shBrush'] = array( 'JScript' );

?>
