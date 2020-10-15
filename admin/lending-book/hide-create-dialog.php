<?php

session_start();
$_SESSION["isShowCreateDialog"] = "false";
unset($_SESSION['editCandidate']);
header('Location:./index.php');

?>