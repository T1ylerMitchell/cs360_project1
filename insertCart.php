<?php
	session_start();

	$name = $_POST['name'];
	$price = $_POST['price'];

	$product = array($name, $price);

	$_SESSION[$name] = $product;

	header('location:view.php'); //create session and send back
?>