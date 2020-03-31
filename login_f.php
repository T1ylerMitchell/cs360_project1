<?php

include_once("db_connect.php");

session_start();

$username = $_POST['username'];

$_SESSION['username']=$username;

header('location:user_profile.php');
exit;

?>
