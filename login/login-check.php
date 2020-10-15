<?php 

require "../db.php";
session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = pg_query($dbconn, "SELECT * FROM users WHERE username = '$username'");

    //  Cek username 
    if( pg_num_rows($result) === 1 ) {

        //Cek password
        $row = pg_fetch_assoc($result);
        if(  password_verify($password, $row["password"])) {
            //  Set session
            $_SESSION["has-login"] = true;

            //Arahkan user ke sistem
            header("Location: ../index.php");
        } else {
            //Jika salah buat session
            $_SESSION["login-failed"] = 'fail';
    
            //Arahkan kembali ke login
            header('Location: index.php');
        }
    } 

?>
