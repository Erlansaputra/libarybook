<?php 
require "../db.php";

    session_start();

    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    //  Cek username sudah ada atau belum
    $checkUsername = pg_query($dbconn,"SELECT username FROM users WHERE username = '$username'");
    if(pg_fetch_assoc($checkUsername)) {
        $_SESSION['check-username'] = 'failed';
        header('Location: index.php');
    }

    //  enkripsi dulu passowrdnya
    $password = password_hash($password, PASSWORD_DEFAULT);

    //  tambahkan ke database
    $result = pg_query($dbconn,
    "INSERT INTO users
    (name,username,password,admin) 
    VALUES 
    ('$name','$username','$password','F')"
    ) or die('Query Failed: ' . pg_last_error());

    //  Session
    $_SESSION['register-status'] = 'success';

    header('Location:../login/index.php');

?>
