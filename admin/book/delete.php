<?php

echo '<pre>' . print_r($_POST, true) . '</pre>';

$id = $_POST['id'];

require '../dbconnection.php';

$query = "DELETE FROM books WHERE id = $1";
//prevent sql injection
$result = pg_prepare($dbconn,'delete_query',$query) or die('Query failed: ' . pg_last_error());
$result = pg_execute($dbconn,'delete_query',array($id)) or die('Query failed: ' . pg_last_error());

header('Location:./index.php');

?>