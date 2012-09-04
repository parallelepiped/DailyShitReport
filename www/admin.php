<?php
  require_once('authorize.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>DSR - Shweets Administration</title>
  <link rel="stylesheet" type="text/css" href="styles/style.css" /> 
  <script type="text/javascript" src="scripts/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="scripts/jquery-ui-1.8.22.custom.min.js"></script>
	
	
</head>
<body>
  <h2>DSR - Shweets Administration</h2>
  <p>Below is a list of all available shweets. Use this to remove spam, duplicates, crud, etc. I'm owen.</p>
  <hr />

<?php
  require_once('ajax/appvars.php');
  require_once('ajax/connectvars.php');

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  // Retrieve the score data from MySQL
  $query = "SELECT * FROM shweets ORDER BY approved ASC, date DESC";
  $data = mysqli_query($dbc, $query);

  // Loop through the array of score data, formatting it as HTML 
  echo '<table>';
  echo '<tr><th>Shweet text</th><th>Date</th><th>Upvotes</th><th>Action</th></tr>';
  while ($row = mysqli_fetch_array($data)) { 
    // Display the shweet data
    echo '<tr><td style="max-width:300px">' . $row['text'] . '</td>';
    echo '<td>' . $row['date'] . '</td>';
    echo '<td>' . $row['upvotes'] . '</td>';
    echo '<td style="min-width:200px"><button class = "removal" id="p' . $row['id'] . '">Remove</button>';
    if ($row['approved'] == '0') {
      echo ' / <button class="approval p' . $row['id'] . '" id="p' . $row['id'] . '">Approve</button>';
    }
    echo '</td></tr>';
  }
  echo '</table>';

  mysqli_close($dbc);
?>

<p>Back to <a href="index.php">DSR</a>.</p>


<script type="text/javascript">
$(function() {
  $(".approval").button().click(function() {
    $.post("approve.php", {id : this.id});
    console.log("clicked on approve", this.id)
    $(this).button( "option", "disabled", true );
    
  });
  
  $(".removal").button().click(function() {
    var pid = this.id
    $.post("remove.php", {id : pid});   
    console.log("clicked on remove", pid);
    $(this).button( "option", "disabled", true );
    var cpid = "." + pid
    $(cpid).button("option", "disabled", true);
  });  
  
  
});



</script>



</body> 
</html>
