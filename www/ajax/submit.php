<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Submit your own shweets!</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>Submit your own shweets!</h2>

-->
<?php
  require_once('appvars.php');
  require_once('connectvars.php');

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  $shweet_text = mysqli_real_escape_string($dbc, trim($_POST['shweet_text']));
  $shweet_text_size = strlen($shweet_text);

  if (!empty($shweet_text) && ($shweet_text_size < SHWEET_MAXCHAR)) {

    $query = "INSERT INTO shweets (date, text) VALUES (NOW(), '$shweet_text')";

    mysqli_query($dbc, $query);

    $shweet_text = "";
    mysqli_close($dbc);
    echo 'shweet submitted.';
  }

?>

<!--
  <hr />
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" id="shweet_text" name="shweet_text" value="<?php if (!empty($shweet_text)) echo $shweet_text; ?>" /><br />
   <hr />
    <input type="submit" value="Deposit." name="submit" />
  </form>
</body> 
</html>

-->
