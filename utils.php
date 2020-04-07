<?php
include_once("db_connect.php");

//$login = $_POST['login'];
//$pass = $_POST['pass'];
//$bdate = $_POST['bdate'];
//$email = $_POST['email'];

function checkUser($db, $login, $pass) {
	$passHash = md5($pass);
	$qStr1 = "SELECT username FROM user WHERE username = '$login';";
	$qStr2 = "SELECT ulogin FROM unverified WHERE ulogin = '$login';";
	$qStr3 = "SELECT username FROM user WHERE username = '$login' AND passHash = '$passHash';";
	$qRes1 = $db->query($qStr1);
	$qRes2 = $db->query($qStr2);
	$qRes3 = $db->query($qStr3);

	$rowCount1 = $qRes1->rowCount();
	$rowCount2 = $qRes2->rowCount();
	$rowCount3 = $qRes3->rowCount();

	if ($rowCount1 == 0) {
		return -1;
	}
	if ($rowCount2 != 0) {
		return -2;
	}
	if ($rowCount3 == 0) {
		return -3;
	}

	return 1;
}

function addUser($db, $login, $pass, $bdate, $email, $fname, $lname, $address, $phone) {
	$passHash = md5($pass);
	$qStr1 = "INSERT INTO user(username, passHash, bdate, email, fname, lname, address, phone_num)"
				 . "VALUE('$login', '$passHash', '$bdate', '$email', '$fname', '$lname',' $address', '$phone');";
	$qStr2 = "INSERT INTO unverified(ulogin) VALUE('$login');";

	$qRes1 = $db->query($qStr1);
	$qRes2 = $db->query($qStr2);
}

function registerUser($db, $input) {
	$login = $input['login'];
	$pass = $input['pass'];
	$bdate = $input['bdate'];
	$email = $input['email'];
	$fname = $input['fname'];
	$lname = $input['lname'];
	$address = $input['address'];
	$phone = $input['phone'];

	if (checkUser($db, $login, $pass) == 1) {
		return false;
	}

	addUser($db, $login, $pass, $bdate, $email, $fname, $lname, $address, $phone);
	//compose a link and email the link to to user
	// $subject = "Verify your email!";
	// $link = "http://www.cs.gettysburg.edu/~kilcem01/cs360/verify.php?uid=".$login;
	// $content = "<html><body><a href='$link'>Click here to verify your email.</a></body></html>";
	// $headers  = 'MIME-Version: 1.0' . "\r\n";
	// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// 	mail($email, $subject, $content, $headers);
	return true;
}

function verifyEmail($db, $userLogin) {
	$qStr = "DELETE FROM unverified WHERE ulogin = '$userLogin';";
	$qRes = $db->query($qStr);
}

function getProducts($db) {
	$qStr = "SELECT * FROM product;";
	$qRes = $db->query($qStr);

	return $qRes;
}

?>
