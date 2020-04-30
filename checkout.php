<?php
  session_start();
  include_once("db_connect.php");
?>

<!DOCTYPE html>
<HTML>
<HEAD>
  <TITLE> Checkout </TITLE>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <STYLE>

.row {
  display: -ms-flexbox; 
  display: flex;
  -ms-flex-wrap: wrap; 
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; 
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; 
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; 
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 500px;
  border: none;
  width: 25%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

span.price {
  float: right;
  color: grey;
}

</STYLE>
</HEAD>

<BODY>

<?php

$username = $_SESSION['username'];
$qStr = "SELECT * FROM user WHERE username='$username';";
$arr = $db->query($qStr)->fetch();
$fname = $arr['fname'];
$lname = $arr['lname'];
$email = $arr['email'];
$phone = $arr['phone_num'];
$address = $arr['address'];
$bdate = $arr['bdate'];

echo 
"
<div class=row>
  <div class=col-75>
    <div class=container>
      <form method=POST action=orderProcess.php>
        <div class=row>
          <a href=viewCart class='btn btn-primary col-lg-1 pull-right'> Edit Cart </a>
          <div class=col-50>
            <h3>Billing Address</h3>
            <label for=fname> Full Name </label>
            <input type=text id=fname name=firstname value='$fname' placeholder=Kim readonly>
            <label for=email> Email </label>
            <input type=text id=email name=email value='$email' placeholder=abcd@example.com readonly>
            <label for=address> Address </label>
            <input type=text id=address name=address value='$address' placeholder='300 N Washington ST' readonly>
            </div>
          </div>

          <div class=col-30>
            <h3> Payment </h3>
            <label for=cname>Name on Card</label>
            <input type=text id=cname name=cardname placeholder=John More Doe>
            <label for=ccnum>Credit/Debit card number</label>
            <input type=text id=ccnum name=cardnumber placeholder=1111-2222-3333-4444>
            <label for=expmonth>Exp Month</label>
            <input type=text id=expmonth name=expmonth placeholder=Decebmber>
            <div class=row>
              <div class=col-50>
                <label for=exp> Exp Year </label>
                <input type=text id=exp name=exp placeholder=2015>
              </div>
              <div class=col-50>
                <label for=cvv>CVV</label>
                <input type=text id=cvv name=cvv placeholder=784>
              </div>  
            </div> 
          </div>
        </div>

        <BR>
        <div class=col-25>
          <div class=container>
           	<h4> Your Order </h4>
            <span class=price style=color:black>
              <i class=fa fa-shopping-cart></i>  
            </span>";

            $name;
            $price;
            $total;
            $quantity;

            foreach($_SESSION as $products) {
              if($products != $_SESSION["username"]) {
                foreach($products as $key => $value) {
                  if($key == 0) {
                     $name = $value;
                  }

                  else if($key == 1) {
                     $price = $value;
                  }

                  else if($key == 2) {
                      $itemTotal = $price * $value;
                      $total = $total + $itemTotal;
                      $quantity = $value;
                  }
                }

                echo 
                "<p>$name <span class=price style=color:black>$price$ X $value &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$itemTotal$</span> </p>";
              }
            }

            echo 
            "<hr>
              <p>Total <span class=price style=color:black><b>$total$</b></span></p>

          </div>
        </div>

        <input type=submit value='Place My Order' class=btn>
      </form>
    </div>
  </div>
</div>";
?>

</BODY>
</HTML>