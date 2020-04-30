<?php
  header("refresh:3;url=view.php");

  session_start();
  include("db_connect.php");
?>

<?php
  	$count = 0;
  	$items = 0;

	foreach ($_SESSION as $products) 
	{
    	if ($products != $_SESSION["username"]) 
    	{
    		$items = $items + 1;
    		$name = $products[0];
    		$query = "SELECT pid FROM products where name='$name';";
    		$result = $db->query($query); 

    		if ($result != false) 
    		{
    			$row = $result->fetch();

    			$pid = $row["pid"];
    			$username = $_SESSION["username"];

    			$qStr2 = "INSERT INTO orders(pid, quantity, orderActive, username) VALUE('$pid', '$products[2]', '1', '$username');"; 
    			$qRes2 = $db->query($qStr2);

    			if($qRes2 != false) {
    				 $count = $count + 1;
    				 unset($_SESSION[$name]); // remove from cart since order placed.
    			}
    		}
        }
    }

    if($count == $items) { // all items placed in db.
    	// TODO - EMAIL

    	$message = 
		'Thank you for your order.
	 	 Your will recieve the tracking details when your item(s) ship. You specified: 
 
	 	------------------------
	 	Username: '.$input['ulogin'].'
	 	Password: "The password you chose at signup."
	 	------------------------
 	
	 	Click this link to activate your account:
	 	verify.php?uid='.$input['ulogin'].'
	 	'; 
	
		mail($input['email'], "Your order", $message, 'noreply@noreply.com');

    	echo "<h3>Order placed successfully. Please check your email for details.<h3>" . "\n";
    	echo "Please wait while we redirect you....";
    }
?>
