  
<div id="shweet-list">
<?php
  require_once('appvars.php');
  require_once('connectvars.php');
  echo '<p> Today\'s top shweets! </p>'; 
  ?> 
  
  <?php
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the score data from MySQL
  $query = "SELECT * FROM shweets"; // " ORDER BY score DESC, date ASC";
  $data = mysqli_query($dbc, $query);

  // Loop through the array of score data, formatting it as HTML 
  echo '<table>';
//  $i = 0;
  while ($row = mysqli_fetch_array($data)) { 
    echo '<tr>Shweet: ' . $row['text'] . '</tr>';
    echo '<tr> Date: ' . $row['date'] . '</tr><br /> ';
    
  }
  echo '</table>';

  mysqli_close($dbc);
?>
</div>