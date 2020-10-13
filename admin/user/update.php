<?php

require '../dbconnection.php';

// initialize varable
$id = $_POST['id'];
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$admin = 'false';
if (array_key_exists('admin', $_POST)) {
    $admin = 'true';
}

$query = "UPDATE users
SET name = '$name',
    username = '$username',
    password = $password,
    admin = '$admin'
WHERE
id = $id;";

// Performing SQL query
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

require './hide-create-dialog.php';

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);

?>