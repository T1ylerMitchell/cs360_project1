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

</STYLE>
Hello: <?php print($_SESSION['username']) ?>
    </head>
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
  <FORM action="profile.html" method="POST" class="frm">
  <div class="container" style="text-align:center;">
    <!-- get the users fname from database -->
    <?php
         $username = $_SESSION['username'];
         $qStr = "SELECT fname FROM user WHERE username='$username';";
         $fname = $db->query($qStr);
    ?>
    <label for="fname"><b> First Name </b></label>
    <input type="text" name="fname" placeholder="<?php echo $fname?>" required="required">
    <label for="email"><b> Email </b></label>
    <input type="text" name="psw" placeholder="Enter Email" required="required">
    <INPUT type="submit" href="profile.html" value="save"/>
  </div>
  </FORM>

</HEADER>

</BODY>

</html>
