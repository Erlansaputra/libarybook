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
$query = "INSERT INTO books (title, description, author, publication_year, image_name) VALUES ('$title', '$description', '$author', '$publication_year', '$image_name');";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

require './hide-create-dialog.php';

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);

?>