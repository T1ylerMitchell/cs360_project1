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
</HEAD>

</BODY>

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
	$name;
	$total = 0;
	foreach($_SESSION as $products) {
		echo "<tr>";
		echo "<td>" .(++$sno). "</td>";
		foreach($products as $key => $value) {
			if($key == 0) {
				echo "<td>" .$value. "</td>"; //name
				$name = $value;
			}

			else if($key == 1) {
				echo "<td id=price$sno>" .$value. "</td>"; //price
				$total = $total + $value;
			}
		}

		echo //quantity
		"<td>
			<select id=quantity$sno onchange=myFunction($sno)>
 	    	<option value=1>1</option>
  			<option value=2>2</option>
  			<option value=3>3</option>
  			<option value=4>4</option>
  			<option value=5>5</option>
			</select>
		 </td>";

		echo "<td id=totalPrice$sno>" .$value. "</td>"; //totalprice

		print "<td> <Button onclick=deleteRow($sno)> Delete </Button></td>"; //delete

		echo "</tr>";
	}
?>  

</div>
</tbody>
<table>

<h4>Total</h4>
<textarea id="total" readonly><?php echo "$total$"; ?></textarea>

<script>calTotal();</script>

<br>
<a href="view.php" class="btn btn-primary col-lg-3"> Continue Shopping </a>
<a class="btn btn-primary col-lg-1 pull-right"> Proceed </a>

<script>
function myFunction($sno) {
	var txt = "quantity" + $sno;
	var x = document.getElementById(txt).value;

	var txtd = "price" + $sno;
	var price = document.getElementById(txtd).textContent;

	document.getElementById("totalPrice" + $sno).innerHTML = price * x;
	calTotal();
}

function deleteRow($sno, $name) {
  	document.getElementById("cartTable").deleteRow($sno);
  	calTotal();

 	
  	//<?php unset($_SESSION[$sno]) ?>;
}

function calTotal() {
	$("total").val('');

	var sno;
	var x = document.getElementById("cartTable").rows.length;

	var total = 0;
	for (sno = 1; sno < x; sno++) { 
  		total = +total + +document.getElementById("totalPrice" + sno).textContent;
	}

  	document.getElementById("total").innerHTML = total + "$";
}
</script>

</BODY>
</HTML>