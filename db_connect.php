<?php
// mysql connection script
$host="ada.cc.gettysburg.edu";
$dbase="s20_mitcty01";
$user="mitcty01";
$pass="mitcty01";

try {
	$db = new PDO("mysql:host=$host;dbname=$dbase",$user,$pass);
}
catch(PDOException $e) {
	die("Error connecting to MySQL database" . $e->getMessage());
}

?>
