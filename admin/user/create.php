<?php

require '../dbconnection.php';  

// initialize varable
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$admin = 'false';
if (array_key_exists('admin', $_POST)) {
    $admin = 'true';
}

// Performing SQL query
$query = "INSERT INTO users (name, username, password, admin)
VALUES ('$name', '$username', '$password', '$admin');";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

require './hide-create-dialog.php';

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);

?>