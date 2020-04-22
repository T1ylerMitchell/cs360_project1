<?php

include_once("db_connect.php");

$username = $_POST['username'];
$bdate = $_POST['bdate'];
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$qStr1 = "UPDATE user SET fname = '$fname' WHERE username = '$username';";
$qRes1 = $db->query($qStr1);
$qStr2 = "UPDATE user SET lname = '$lname' WHERE username = '$username';";
$qRes2 = $db->query($qStr2);
$qStr3 = "UPDATE user SET bdate = '$bdate' WHERE username = '$username';";
$qRes3 = $db->query($qStr3);
$qStr4 = "UPDATE user SET email = '$email' WHERE username = '$username';";
$qRes4 = $db->query($qStr4);
$qStr5 = "UPDATE user SET address = '$address' WHERE username = '$username';";
$qRes5 = $db->query($qStr5);
$qStr6 = "UPDATE user SET phone = '$phone' WHERE username = '$username';";
$qRes6 = $db->query($qStr6);

header('location:user_profile.php');
//echo $username;
//echo $bdate;
//echo $email;
//echo $fname;
//echo $lname;
//echo $address;
//echo $phone;

exit;

?>