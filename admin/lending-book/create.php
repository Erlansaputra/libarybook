<?php

require '../dbconnection.php';  

// initialize varable
$user_id = $_POST['user_id'];
$book_id = $_POST['book_id'];

// Performing SQL query
$query = "INSERT INTO lending (user_id, book_id)
VALUES ('$user_id', '$book_id');";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

require './hide-create-dialog.php';

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);

?>