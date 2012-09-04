<?php
  require_once ('authorize.php');

  require_once('ajax/appvars.php');
  require_once('ajax/connectvars.php');

  $id = substr($_POST['id'], 1);
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  $query = "UPDATE shweets SET approved = 1 WHERE id = $id";
  mysqli_query($dbc, $query);
  mysqli_close($dbc);

?>