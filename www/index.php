<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>DSR</title>
		<link rel="shortcut icon" href="images/toilet-favicon.ico" >
		<link type="text/css" href="styles/bubbs.css" rel="stylesheet" />	
    <link type="text/css" href="styles/custom-theme/jquery-ui-1.8.22.custom.css" rel="stylesheet" />
		<link type="text/css" href="styles/style.css" rel="stylesheet" />


    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>

	</head>


<body>

<div class = "container" style = "width : 98%">

  <!--<div id="headline"> -->

 
<div class="group">
  <div class = "header">
  <h1 >daily shit report</h1>
  <h3 style="text-align : left; padding : 5px">
 

<?php
    require_once('ajax/appvars.php');
    require_once('ajax/connectvars.php');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

    $query = 'SELECT text FROM taglines WHERE id >= (SELECT FLOOR( MAX(id) * RAND()) FROM taglines ) ORDER BY id LIMIT 1;';


    $data = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($data);
    echo $row['text'];
?> 
</h3>
  
  
  <!-- begin submit button-->
  
  <button id = "submit-button" href="#mySubmitButton" style = "float : right; padding : 0 !important; font: 100% 'Lucida Grande', 'Trebuchet MS', Verdana, sans-serif !important;" aria-disabled = "false">
  </button>

</div>
</div>

<div id="dialog-form" title="Make a contribution of your own">
	<p class="validateTips">Max 140 characters.</p>
	<form>
	<fieldset>
		<textarea rows="5" type="textarea" name="shweet" id="shweet"></textarea>
	</fieldset>
	</form>
</div>
<div id="acknowledgement" title = "Thank you!">
  Your shweet has been submitted for approval.
</div>

  <!-- /end submit button -->


  <div id="tabs" style="position:relative">
     <ul>                 
        <li><a href="ajax/freshest.php">Fresh</a></li>
        <li><a href="ajax/hottest.php" >Hot</a></li>
        <li><a href="ajax/worst.php"   >Best</a></li>
        <li><a href="ajax/more.php"    >More...</a></li>
    </ul>
    
  </div>

</div>



<script type="text/javascript" src="scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.22.custom.min.js"></script>
<script type="text/javascript" src="scripts/dsr.js"></script>
<script type="text/javascript" src="scripts/ios-orientationchange-fix.js"></script>


</body> 
</html>
