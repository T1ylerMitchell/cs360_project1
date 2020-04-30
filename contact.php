<?php
	header("refresh:3;url=index.html");

	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject= $_POST["subject"];
	$message = $_POST["message"];

	//TODO - EMAIL
	mail(    , "Your order", $message, '$email');

	echo "<H3> Message sent </H3>";
?>