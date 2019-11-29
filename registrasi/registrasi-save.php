<?php
require "../db.php";

session_start();

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO users (nama,username, password) VALUES ('$name','$username', '$hashedPassword');";
$result = pg_query($query) or die('Query Failed: ' . pg_last_error());

$_SESSION['registrasi-status'] = 'success';

header('Location:../login/login.php');
