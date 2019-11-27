<?php

echo '<pre>' . print_r($_POST, true) . '</pre>';
echo '<pre>' . print_r($_FILES, true) . '</pre>';

// if image.name = null, gak usah edit image

$file_name = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'].'/uploaded/images/'.$file_name);

require '../dbconnection.php';

// initialize varable
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$author = $_POST['author'];
$publication_year = $_POST['publication_year'];
$image_name = $file_name;

$query = "UPDATE books
SET title = '$title',
    description = '$description',
    author = $author,
    publication_year = '$publication_year'
WHERE
id = $id;";

if ($image_name != '') {
    $query = "UPDATE books
    SET title = '$title',
        description = '$description',
        author = $author,
        publication_year = '$publication_year',
        image_name = '$image_name'
    WHERE
    id = $id;";
}

// Performing SQL query
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

require './hide-create-dialog.php';

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);

?>