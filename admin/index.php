<!-- Check session, (userRole != admin) ? redirect -> login : redirect -> book -->

<?php 

session_start();

$userRole = $_SESSION['userRole'];

if ($userRole != 'admin') {
    header('Location:../login.php');
} else {
    header('Location:book.php');
}

?>