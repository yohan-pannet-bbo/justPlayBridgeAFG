<?php
$game_title = "Bridge - 4 Hands";
$game_base= "//www.bridgebase.com/arcade/web4";
$dc_base  = "//www.bridgebase.com/arcade/dc3";

if (  stripos( $_SERVER["HTTP_REFERER"] , "acbl.org" )  !== false && $_REQUEST['p'] != 'n'  )  {
        header('Location: https://' . $_SERVER['SERVER_NAME']. $_SERVER['REQUEST_URI']  . '?p=n&cb=acb1web4543');
        exit;
}
// Expire cached copy in 1 days
$seconds_to_cache = 24 * 60 * 60 ;
$ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
header("Expires: $ts");
header("Pragma: cache");
header("Cache-Control: max-age=$seconds_to_cache");
echo <<<EOF1
<!doctype html>
<!--[if lte IE 9]>
<!doctype html>
<html>
  <head>
    <meta HTTP-EQUIV="REFRESH" content="0; url=<%= url %>">  
  </head>
</html>
<![endif]-->

<![if !IE]>
<!doctype html>
<html>
<head>
<style type="text/css">
  .buttonBar {
    background-color: #106610 !important;
    background: #106610 !important;
  }
  .dealViewer {
  background-color: #106610;
  background: -webkit-linear-gradient(#106610, #106610) !important; /* For Safari 5.1 to 6.0 */
  background: -o-linear-gradient(#164610, #106610 !important; /* For Opera 11.1 to 12.0 */
  background: -moz-linear-gradient(#106610,#106610) !important; /* For Firefox 3.6 to 15 */
  background: linear-gradient(#106610, #106610) !important; /* Standard syntax */  
}
</style> 


  <meta name="viewport" content="width=device-width, initial-scale=1.0" >
  <!--<meta name="viewport" content="width=768">-->
  <title>$game_title</title>
  <script language="Javascript">

/*
Override browser http opens and force https - unless URL contains :80/
*/

(function() {
    var proxied = window.XMLHttpRequest.prototype.open;
    window.XMLHttpRequest.prototype.open = function() {
      if ( arguments[1].indexOf("http:") === 0  && arguments[1].indexOf(":80/") == -1 ) {
        arguments[1] = arguments[1].replace("http:","https:");
        } 
        return proxied.apply(this, [].slice.call(arguments));
    };
})();
  </script>  
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
  <!-- jquery mobile custom built with just support for orientation change -->
  <script src="$game_base/js/jquery.mobile.custom.js"></script>
  <script src="$game_base/js/Modernizr.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" />
  <link type="text/css" rel="stylesheet" href="$dc_base/css/Webtest.css">
  <link type="text/css" rel="stylesheet" href="$game_base/css/game.css">
  <link type="text/css" rel="stylesheet" href="$game_base/css/pocketgrid.css">
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-11095855-4', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>  
<noscript>
  <div style="width: 22em; position: absolute; left: 50%; margin-left: -11em; color: red; background-color: white; border: 1px solid red; padding: 4px; font-family: sans-serif">
    Your web browser must have JavaScript enabled in order for this application to display correctly.
  </div>
</noscript>
<div id="dialog" title="">
<iframe id="dialogiframe" style="width:100%;height:100%;border:0;" src=""></iframe>
</div>


<div id='bbo_arcade1_ad' scrolling="no" src="" ></div>
<div id="framecontent">
  <span id="hidelbbtn">X</span>
  <div class="lbcontainer">
    <div id="leaderboard">
      <div id="lbtable" class="main block-group"></div>
    </div>  
    <div id="playername"></div>
    <span id="playercount"></span>
  </div>
</div>

<div id="maincontent">
    <div id="BBO_mainDiv" class="BBO_mainDivStyle"></div>
    <div id="BBO_inchDiv" style="width: 1in; height: 1in"></div>    
</div>
  <script src="$game_base/js/app.js"></script>
  <script type="text/javascript" language="javascript" src="$dc_base/webtest/webtest.nocache.js"></script>

</body>
</html>
<![endif]>
EOF1;
?>
