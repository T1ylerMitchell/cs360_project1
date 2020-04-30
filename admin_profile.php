<?php
      session_start();
      include_once("db_connect.php");
?>

<HTML>
	<TITLE> Upload+Parse </TITLE>
<HEAD>
  
<STYLE>
	input[type=submit] {
   background-color: white;
   color: black;
   border-radius: 15px;  
   cursor: pointer;
   border: 1.5px solid black;
   height: 25px;
   padding: 4px;
}

</STYLE>

<BODY>
<link rel="stylesheet" href="css/old_style.css" />
<h3>Upload an Excel file</h3>

<form method="POST" action="excel_f.php">
  <label for="excel">Select an Excel file:</label>
  <input type="file" name="excel">
  <br><br>
  <input type="submit" value="submit">
</form>

<HEADER id="profile-showcase">
  
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
  <FORM action="profile.html" method="POST">
  <div class="container" style="text-align:center;">
    <!-- get the users fname from database -->
    <?php
         $username = $_SESSION['username'];
         $qStr = "SELECT * FROM user WHERE username='$username';";
         $arr = $db->query($qStr)->fetch();
         $fname = $arr['fname'];
         $email = $arr['email'];
    ?>
    <label for="fname"><b> First Name </b></label>
    <input type="text" name="fname" value="<?php echo $fname?>" required="required">
    <label for="email"><b> Email </b></label>
    <input type="text" name="psw" value="<?php echo $email?>" required="required">
    <INPUT type="submit" href="profile.html" value="save"/>
  </div>
  </FORM>

</HEADER>

<button onclick="window.location.href = 'statistics.php';">Check Website Statistics</button>

</BODY>

</HEAD>
</HTML>