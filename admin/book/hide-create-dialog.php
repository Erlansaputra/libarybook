<?php

session_start();
$_SESSION["isShowCreateDialog"] = "false";
header('Location:./index.php');

?>