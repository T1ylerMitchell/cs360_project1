<?php
	session_start();

	$name = $_POST["name"];
	$_SESSION[$name][2] = $_POST["quantity"]; 

	header('location:viewCart.php');
?>
