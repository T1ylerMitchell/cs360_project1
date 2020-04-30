<?php
	session_start();
?>

<!DOCTYPE html>
<HTML>
<HEAD>
	<TITLE> Cart </TITLE>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <STYLE>

 textarea { 
 	resize: none;
 	border: 2px solid black;
 	padding: 5px;
}

</STYLE>
</HEAD>

</BODY>

<script>
function setSelect($sno, $val) {
	document.getElementById("quantity" + $sno).value = $val;
}
</script>

<center>
<h1> ENDT1 </h1> 
<h1 align="center">Your Cart Products:<h1>
</center>

<div class="container">
<table class=table id=cartTable>
		<tr>
		<th>Sno</th>
		<th>Name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Total Price</th>
		<th>Delete</th>
		</tr>

<tbody>
<?php
	$sno = 0;
	$total = 0;
	$price;
	$name;
	foreach($_SESSION as $products) {
		if($products != $_SESSION["username"]) {
			echo "<tr>";
			echo "<td>" .(++$sno). "</td>";

			foreach($products as $key => $value) { //array
				if($key == 0) {
					echo "<td>" .$value. "</td>"; //name
					$name = $value;
				}

				else if($key == 1) {
					echo "<td id=price$sno>" .$value. "</td>"; //price

					$totalPriceItem = $value * $_SESSION[$name][2];
					$total = $total + $totalPriceItem;
				}
			}

			echo //quantity
			"<td>
			<form id=form$sno method=POST action=quantitySelect.php>
				<input type=hidden name=name value=$name>
				<select name=quantity id=quantity$sno onchange=myFunction($sno)>
	 	    		<option value=1>1</option>
	  				<option value=2>2</option>
	  				<option value=3>3</option>
	  				<option value=4>4</option>
	  				<option value=5>5</option>
				</select>
			</form>
			</td>";

			echo "<td id=totalPrice$sno>" .$totalPriceItem. "</td>"; //=price  because quantity currently 1

			$s = $_SESSION[$name][2];
			echo "<script type=text/javascript> setSelect($sno, $s); </script>";			

			echo 
			"<td>
				<form method=POST action='unset.php'>
	    			<Button type=submit name=name value=$name> Delete </Button>
	    		</form>
	    	</td>";

			echo "</tr>";
		}
	}
?>  

</div>
</tbody>
<table>

<h4>Your Total:</h4>
<textarea id="total" cols="10" rows="1" readonly> <?php echo "$total$"; ?> </textarea>

<br>
<a href="view.php" class="btn btn-primary col-lg-3"> Continue Shopping </a>

<?php
	if($total > 0) {
		echo "<a href=checkout.php class='btn btn-primary col-lg-1 pull-right'> Proceed </href>";
	}
?>

<script>
function onSelectChange($sno) {
 	document.getElementById("form" + $sno).submit();
}

function myFunction($sno) {
	var quantity = document.getElementById("quantity" + $sno).value;
	var price = document.getElementById("price" + $sno).textContent;
	document.getElementById("totalPrice" + $sno).innerHTML = price * quantity;

	calTotal();
	onSelectChange($sno);
}

function calTotal() {
	$("total").val('');

	var sno;
	var x = document.getElementById("cartTable").rows.length;

	var total = 0;
	for (sno = 1; sno < x; sno++) { 
  		total = +total + +document.getElementById("totalPrice" + sno).textContent;
	}

  	document.getElementById("total").innerHTML = total + "$"; // update textbox
}

</script>

</BODY>
</HTML>