<?php

$file_name = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'].'/uploaded/images/'.$file_name);

require '../dbconnection.php';

// initialize varable
$title = $_POST['title'];
$description = $_POST['description'];
$author = $_POST['author'];
$publication_year = $_POST['publication_year'];
$image_name = $file_name;

// Performing SQL query
$query = "INSERT INTO books (title, description, author, publication_year, image_name) VALUES ($1, $2, $3, $4, $5);";
//sql injection; it's better and more safe to use pg_prepare instead of pg_query
//$result = pg_query($query) or die('Query failed: ' . pg_last_error());
$result = pg_prepare($dbconn,'my_query',$query) or die('Query preparation failed: ' . pg_last_error());
$result = pg_execute($dbconn,'my_query',array($title,$description,$author,$publication_year,$image_name)) or die('Query execution failed: ' . pg_last_error());
require './hide-create-dialog.php';

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);

?>