<?php

require "../db.php";

session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = pg_query($query) or die('Query Failed: ' . pg_last_error());

    $arrayResult = pg_fetch_array($result);
    
    if (isset($arrayResult['username']) && password_verify($password, $arrayResult['password'])) {
        echo 'Password is valid!';
        $_SESSION['has-login'] = true;
        unset($_SESSION['login-failed']);
        header('Location:../index.php');
    } else {
        echo 'Invalid password.';
        $_SESSION['login-failed'] = 'fail';
        header('Location:index.php');
    }