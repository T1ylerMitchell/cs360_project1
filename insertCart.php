<?php
	session_start();

	$name = $_POST['name'];

	if($_SESSION[$name] == null) { // check not already in cart
		$price = $_POST['price'];

		$product = array($name, $price, 1); //name, price, quantity.
		$_SESSION[$name] = $product;
	} 

	header('location:view.php'); //created the session cart data and send back to view
?>