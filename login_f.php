<?php

include_once("db_connect.php");

session_start();

$username = $_POST['username'];

$_SESSION['username']=$username;

$currDate=date('Y-m-d h:i:sa');
$qStr1="INSERT INTO statistics(username, date) VALUE('$username', '$currDate');";
$qRes1=$db->query($qStr1);

$qStr2 = "SELECT e_username FROM emp WHERE e_username = '$username';";
$qRes = $db->query($qStr2);
$rowCount = $qRes->rowCount();

if($rowCount >= 1)
{
    header('location:admin_profile.php');    
}
else
{
    header('location:user_profile.php');
}
exit;

?>
