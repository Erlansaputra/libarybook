<?php

echo '<pre>' . print_r($_FILES, true) . '</pre>';
echo '<pre>' . print_r($_POST, true) . '</pre>';

$file_name = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];

echo $_SERVER['DOCUMENT_ROOT'];

move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'].'/uploaded/images/'.$file_name);

// require '../dbconnection.php';

// // initialize varable
// $title = $_POST['title'];
// $description = $_POST['description'];
// $author = $_POST['author'];
// $publication_year = $_POST['publication_year'];

// // Performing SQL query
// $query = "INSERT INTO books (title, description, author, publication_year) VALUES ('$title', '$description', '$author', '$publication_year');";
// $result = pg_query($query) or die('Query failed: ' . pg_last_error());

// require './hide-create-dialog.php';

// // Free resultset
// pg_free_result($result);

// // Closing connection
// pg_close($dbconn);

?>