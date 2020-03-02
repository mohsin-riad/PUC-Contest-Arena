<?php
    session_start();
    if($_SESSION['admin_login_status']!="loged in" and ! isset($_SESSION['username']) )
    header("Location:../index.php");
     
    if(isset($_GET['sign']) and $_GET['sign']=="out") {
	  $_SESSION['admin_login_status']="loged out";
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

</head>
<body>
<header class="clearFix">
  <div class="wrap"> <a id="logo" href="#">Puc Contest Arena</a>
    <hr>
    <nav>
      <div id="nav"> <strong>Navigation</strong>
      <ul>
          <li> <a href="dashboard.php">Dashboard</a> </li>
          <li> <a href="contest_creation.php">Create contest</a> </li>
          <li> <a href="approval.php">Approval</a> </li>
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
      <h1>Welcome to Administration.<br> <strong>Control your contest and blog.</strong></h1>
  </div>
</div>
<hr>
<div id="content">
  <div class="wrap clearFix">
    <h2></h2>
    <h2></h2>
    <h2></h2>
    
  </div>
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

