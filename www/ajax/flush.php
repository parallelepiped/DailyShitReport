<?
  require_once('appvars.php');
  require_once('connectvars.php');
  require_once('update_database.php');

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  
  
  $shweet_id = substr($_POST['shweet_id'],1);   

  $query = "INSERT INTO votes (date, shweet_id) VALUES (NOW(), '$shweet_id')";
      
  mysqli_query($dbc, $query);
  $shweet_id = "";
  mysqli_close($dbc);
?>

