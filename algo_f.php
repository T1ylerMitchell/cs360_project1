<?php
include_once("db_connect.php");
include("utils.php");

print("<h1>you should take:</h1>");
$bgLevel=$_POST['bgLevel'];
$bgTrend=$_POST['bgTrend'];
$weight=$_POST['weight'];
$activityLevel=$_POST['activityLevel'];
$treatment = dosageAlgo($weight, $activityLevel, $bgLevel, $bgTrend);
$weightIncrease= weightIncrease($weight);
echo $weightIncrease;
echo implode(", ", $treatment); 
?>
