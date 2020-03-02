<?php
    session_start();
    if($_SESSION['member_login_status']!="loged in" and ! isset($_SESSION['username']) )
    header("Location:../index.php");
   
    if(isset($_GET['sign']) and $_GET['sign']=="out") {
	  $_SESSION['member_login_status']="loged out";
	  unset($_SESSION['username']);
    header("Location:../index.php");    
   }
?>

<!DOCTYPE html>
<html>
<head>
<title>PUC CONTEST ARENA || HOME</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/print.css" media="print">
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/custom.js"></script>
<style>
img {
    border: 2px solid #ddd;
    vertical-align: middle;
    width: 160px;
    height: 100px;
    border-radius: 8px;
}
img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
</style>
</head>
<body>
<header class="clearFix">
  <div class="wrap"> <a id="logo" href="#">Puc Contest Arena</a>
    <hr>
    <nav>
      <div id="nav"> <strong>Navigation</strong>
        <ul>
          <li> <a href="contestant_home.php">Home</a> </li>
          <li> <a href="https://codeforces.com/contests">Practice</a> </li>
          <li> <a href="contest.php"> Contest </a></li>
          <li> <a href="#"> My Profile </a></li></li>
          <li> <a href="?sign=out">Log Out</a> </li>
        </ul>
      </div>
    </nav>
  </div>
</header>
<hr>
<div id="intro">
  <div class="inner">
    <div class="wrap clearFix">
        <div class="clearFix">
              <h1>Look up Your Profile.</h1>
        </div>
    </div>
  </div>
</div>

            

<hr>
<div id="content">
  <div class="wrap clearFix">
    <h2>My information</h2>
        <?php
        include("../connect.php");
        $username=$_SESSION['username'];
        $sql="select  username,image,real_name,university,gender,b_date,email from member_reg where username='$username'";
        $r=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($r);
        $image=$row['image'];
        $name=$row['username'];
        $rname=$row['real_name'];
        $uni=$row['university'];
        $gndr=$row['gender'];
        $dob=$row['b_date'];
        $email=$row['email'];
        echo "<img src='../upload_image/$image'><a href='#' class='button'>$username</a><h2></h2><p>Full Name</p><h2>$rname</h2><p>Gender</p><h2>$gndr</h2><p>Date Of Birth</p><h2>$dob</h2><p>Institution</p><h2>$uni</h2><p>Email</p><h2>$email</h2>" 
        ?> 
  </div>
</div>


<footer class="clearFix">
  <div class="wrap clearFix">
    <p class="floatRight"> Copyright &copy; 2019 <a href="https://www.facebook.com/mdmohsin.riad">Mohsin Riad</a> &ndash; All Rights Reserved<br>
    <p class="socialIcons"> <a href="https://www.facebook.com/mdmohsin.riad" class="facebook">Facebook</a> <a href="https://github.com/mohsin-riad" class="twitter">Github</a> </p>
  </div>
</footer>
</body>
</html>