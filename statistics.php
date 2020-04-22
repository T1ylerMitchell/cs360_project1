<?php
  include_once("db_connect.php");
  
  $currDate=date("Y-m-d");
  $strDate=strval($currDate);
  echo $strDate;
  $qStr="SELECT COUNT(*) AS num, date FROM statistics WHERE date='$currDate';";
  $arr=$db->query($qStr)->fetch();
  $num=$arr['num'];
  $date=$arr['date'];
?>

<html>

<h1> There have been <?php echo $num;?> on <?php echo $date;?>.</h1>


</html>