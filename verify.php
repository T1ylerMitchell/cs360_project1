<?php

include_once("db_connect.php");

include("utils.php");

$uid=$_GET['uid'];

verifyEmail($db,$uid);

header("Location:login.html");

?>

