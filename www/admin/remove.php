<?php
  require_once('authorize.php');

  require_once('../ajax/appvars.php');
  require_once('../ajax/connectvars.php');

  $id = substr($_POST['id'],1);

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Delete the score data from the database
  $query = "DELETE FROM shweets WHERE id = $id LIMIT 1";
  mysqli_query($dbc, $query);
  mysqli_close($dbc);

?>