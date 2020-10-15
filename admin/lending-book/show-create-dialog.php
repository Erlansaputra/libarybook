<?php

session_start();
$_SESSION["isShowCreateDialog"] = "true";
// echo $_SESSION["isShowCreateDialog"];
header('Location:./index.php');

?>