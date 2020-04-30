<?php
  session_start();
  include_once("db_connect.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Your ENDT1 Profile</title>
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
</HEAD>

<BODY bgcolor="white" style="text-align:center;">

<HEADER id="profile-showcase">
  <link rel="stylesheet" href="css/old_style.css" />
  <!-- profile photo goes at top of page-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <div id="profile-container" style="width:160px; height:160px; border:1px solid lightgrey; position: relative; overflow: hidden;">
     <img id = "output" src="img/profile_placeholder.jpg" class="prof-img">
  </div>
  <input id="imageUpload" type="file" name="profile_photo" onchange="loadFile(event);" placeholder="Photo" required="required" capture>
  <label for="file" style="cursor: pointer;">Upload Image</label>

  <script>
    function loadFile(event) {
  	  var image = document.getElementById('output');
  	  image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

  <!-- profile information goes here-->
  <FORM action="updateProfile_f.php" method="POST" class="frm">
  <div class="container" style="text-align:center;">
    <!-- get the users fname from database -->
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
    ?>
    <label for="fname"><b> First Name </b></label>
    <input type="text" name="fname" value="<?php echo $fname?>" required="required">
    <label for="lname"><b> Last Name </b></label>
    <input type="text" name="lname" value="<?php echo $lname?>" required="required">
    <label for="bdate"><b> Birthdate </b></label>
    <input type="text" name="bdate" value="<?php echo $bdate?>" required="required">
    <label for="email"><b> Email </b></label>
    <input type="text" name="email" value="<?php echo $email?>" required="required">
    <label for="phone"><b> Phone Number </b></label>
    <input type="text" name="phone" value="<?php echo $phone?>" required="required">
    <label for="address"><b> Address </b></label>
    <input type="text" name="address" value="<?php echo $address?>" required="required">
    <input type="hidden" name="username" value="<?php echo $username?>">
    <button type="submit">Save</button>
  </div>
  </FORM>
  
<div class="topcorner">
<ul>

<form name="subscribeNow" method="POST" action="subscription.php" class="frm">
    <input type="hidden" name="username" value="<?php echo $username?>">
    <button type="submit">New Subscription</button>
</form>

<form name="viewProducts" method="POST" action="view.php" class="frm">
    <input type="hidden" name="username" value="<?php echo $username?>">
    <button type="submit">Browse Products</button>
</form>

</ul>
</div>

</HEADER>

</BODY>
</html>
