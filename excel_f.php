<?php
  include("SimpleXLSX.php");
  include_once("db_connect.php");
  
  $excel = $_POST['excel'];

  if($xlsx = SimpleXLSX::parse($excel)) {

    foreach ($xlsx->rows() as $elt) { 

      $query = "INSERT INTO products(name, description, price, image) VALUE('$elt[0]', '$elt[1]', '$elt[2]', '$elt[3]');";
      $qRes1 = $db->query($query);

      if($qRes1 == false) {
        echo "<h3>Failed to insert: $elt[0]<h3>";
      }
    } 

  } else {
    echo SimpleXLSX::parseError();
  }
?>