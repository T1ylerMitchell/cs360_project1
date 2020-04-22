<!DOCTYPE html>
<HTML>
	<TITLE> Products </TITLE>
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

<?php
  include("db_connect.php");
  include("utils.php");

  $qRes = getProducts($db);

  while($row = $qRes->fetch()) {
      $name = $row['name'];
      $description= $row['description'];
      $price = $row['price'];
      $image = $row['image'];

      echo 
      "<main class=container>
      <!-- Left Column / Headphones Image -->
        <div class=left-column>
        <img data-image=black class=active src=$image>
        </div>
 
      <!-- Right Column -->
        <div class=right-column>
        <!-- Product Description -->
        <div class=product-description>
        <span>ENDT1</span>
        <h1>$name</h1>
        <p>$description</p>
        </div>
 
      <!-- Product Pricing -->
        <div class=product-price>
        <span>$price$</span>
        <a href=# class=cart-btn>Add to cart</a>
        </div> 
        </main>
        <hr>";
    } 
?>
</BODY>

</HEAD>
</HTML>