<?php

echo '<pre>' . print_r($_POST, true) . '</pre>';

session_start();

$_SESSION['editCandidate'] = $_POST['editCandidate'];

require 'show-create-dialog.php';

?>

