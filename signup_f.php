<?php
include("db_connect.php");
include("utils.php");

	$input = $_POST;
	registerUser($db, $_POST);
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Log in now</title>
	</head>
	<body>
	Your account has been created, check your email to verify your account.
	<button type="button" href="login.html">Log in</button>
	</body>
</html>
