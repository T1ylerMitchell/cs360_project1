<?php 
	session_start();

    unset($_SESSION[$_POST['name']]); 
    header('location:viewCart.php'); 
?>