<?php
    session_start();
    include_once("db_connect.php");
?>

<!DOCTYPE html>
<HTML>
	<TITLE> Products </TITLE>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<HEAD>

<STYLE>
  /* Basic Styling */
	html, body {
  height: 100%;
  width: 100%;
  margin: 0;
  font-family: 'Roboto', sans-serif;
}
 
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 15px;
  display: flex;
}

	/* Columns */
.left-column {
  width: 65%;
  position: relative;
}
 
.right-column {
  width: 35%;
  margin-top: 60px;
}

/* Left Column */
.left-column img {
  width: 380px;
  height: 370px;
  position: absolute;
  left: 100px;
  top: 0;
  opacity: 0;
  transition: all 0.3s ease;
}
 
.left-column img.active {
  opacity: 1;
}

/* Product Description */
.product-description {
  border-bottom: 1px solid #E1E8EE;
  margin-bottom: 20px;
}

.product-description span {
  font-size: 12px;
  color: #358ED7;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
}

.product-description h1 {
  font-weight: 300;
  font-size: 52px;
  color: #43484D;
  letter-spacing: -2px;
}

.product-description p {
  font-size: 16px;
  font-weight: 300;
  color: #86939E;
  line-height: 24px;
}

/* Product Price */
.product-price {
  display: flex;
  align-items: center;
}
 
.product-price span {
  font-size: 26px;
  font-weight: 300;
  color: #43474D;
  margin-right: 20px;
}
 
.cart-btn {
  display: inline-block;
  background-color: #7DC855;
  border-radius: 6px;
  font-size: 16px;
  color: #FFFFFF;
  text-decoration: none;
  padding: 12px 30px;
  transition: all .5s;
}

.cart-btn:hover {
  background-color: #64af3d;
}
</STYLE>

<BODY>

<div class="container">
<a href="index.html" class="btn btn-warning col-lg-2">Home</a>
<a href="viewCart.php" class="btn btn-warning col-lg-2">Cart</a>
</div>

<?php
  include("db_connect.php");
  include("utils.php");

  $qRes = getProducts($db);

  while($row = $qRes->fetch()) {
      $name = $row['name'];
      $description = $row['description'];
      $price = $row['price'];
      $image = $row['image'];

      echo 
      "<form method='POST' action='insertCart.php'>
      <main class=container>
      	<!-- Item Image -->
        <div class=left-column>
        <img data-image=black class=active src=$image style=width:350px;height:350px;>
        </div> 
 
     	 <!-- Item name and description -->
        <div class=right-column>
        <!-- Product Description -->
        <div class=product-description>
        <span>ENDT1</span>
        <h1>$name</h1>
        <p>$description</p>
        </div>

      	<input type=hidden name='name' value='$name'>
      	<input type=hidden name='price' value='$price'>
 
         <!-- Item Price -->
        <div class=product-price>
        <span>$price$</span>
        <input type='submit' value='Add to Cart' class=cart-btn></input>
        </div> 
        </main>
        <hr>
        </form>";
    } 
?>

</BODY>

</HEAD>
</HTML>