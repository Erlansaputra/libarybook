<?php
require "../db.php";

        session_start();
        
        $name = $_POST['name'];
        $username = stripslashes($_POST['username']);
        $password = $_POST['password'];

        //  Password encryption
        $password = password_hash($password, PASSWORD_DEFAULT);

        //  Add to database
        $query = "INSERT INTO users (name,username, password, admin) VALUES ('$name','$username', '$password','false');";
        
        $result = pg_query($query) or die('Query Failed: ' . pg_last_error());

        $_SESSION['register-status'] = 'success';

        header('Location:../login/index.php');
    
?>