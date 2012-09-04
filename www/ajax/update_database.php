<?php

$query1 = "UPDATE shweets SET shweets.upvotes = (SELECT COUNT(*) FROM votes WHERE shweets.id = votes.shweet_id);";
$query2 = "UPDATE shweets SET shweets.vote_time = (SELECT MIN(DATEDIFF(CURRENT_TIMESTAMP, date)) FROM votes WHERE shweets.id = votes.shweet_id);";
$query3 = "UPDATE shweets	SET shweets.raw_score = (SELECT SUM(POWER(2, DATEDIFF(date, CURRENT_TIMESTAMP))) FROM votes WHERE shweets.id = votes.shweet_id);";



$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
$data = mysqli_query($dbc, $query1);
$data = mysqli_query($dbc, $query2);
$data = mysqli_query($dbc, $query3);
mysqli_close($dbc);
?>