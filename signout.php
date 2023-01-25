<?php 
session_start() ;
session_destroy();
session_start();
$_SESSION['loggedIn'] = false;
header('Location: signin.php');
?>