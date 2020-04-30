<?php
    include_once("db_connect.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Start a new Subsciption</title>
<STYLE>
  input[type=text] {
    width: 10%;
    color: black;
    border: 2px solid black;
    border-radius: 4px;
    padding: 4px;
  }

  input[type=submit] {
      background-color: ;
      color: black;
      border-radius: 10px;
      cursor: pointer;
      border: 1.5px solid black;
      height: 25px;
  }

  .prof-img {
   max-height:100%;
   position: absolute;
   top: -9999px;
   bottom: -9999px;
   left: -9999px;
   right: -9999px;
   margin: auto;
  }
  
  .topcorner{
    position:absolute;
    top:30px;
    right: 100px;
 }

</STYLE>

<?php
         $username = $_POST['username'];
         $qStr = "SELECT * FROM user WHERE username='$username';";
         $arr = $db->query($qStr)->fetch();
         $fname = $arr['fname'];
         $lname = $arr['lname'];
         $address = $arr['address'];
?>
    
Hello: <?php print($_POST['username']) ?>
    </head>
<BODY bgcolor="white" style="text-align:center;">

<HEADER id="subscribe-showcase">
  <link rel="stylesheet" href="css/old_style.css" />

  <FORM action="subsciprion_f.php" method="POST" class="frm">
  <div class="container" style="text-align:center;">
  	<label for="nDays"><b> How many days apart do you need your product? </b></label>
    <input type="text" name="nDays" value="30" required="required">
    <label for="fname"><b> First Name </b></label>
    <input type="text" name="fname" value="<?php echo $fname?>" required="required">
    <label for="lname"><b> Last Name </b></label>
    <input type="text" name="lname" value="<?php echo $lname?>" required="required">
    <label for="address"><b> Address </b></label>
    <input type="text" name="address" value="<?php echo $address?>" required="required">
    <input type="hidden" name="username" value="<?php echo $username?>">
    <button type="submit">Subscribe Now</button>
  </div>
  </FORM>

</HEADER>

</BODY>

</html>
