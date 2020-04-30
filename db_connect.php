<?php
//mysql connection script

$dbase="s20_mine";
$user="root";
$pass="hyden55@hy@7";

try {
	$db = new PDO("mysql:host=127.0.0.1;dbname=$dbase", $user, $pass);
}

catch(PDOException $e) {
	die("Error connecting to MySQL database " . $e->getMessage());
}

?>
