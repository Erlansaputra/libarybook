<?php

require '../dbconnection.php';

// initialize varable
$id = $_POST['id'];
$user_id = $_POST['user_id'];
$book_id = $_POST['book_id'];
$returned = 'false';
if (array_key_exists('returned', $_POST)) {
    $returned = 'true';
}

$query = "UPDATE lending
SET user_id = $user_id,
    book_id = $book_id,
    returned = $returned
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