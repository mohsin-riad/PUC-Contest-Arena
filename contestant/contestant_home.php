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
.avatar {
  vertical-align: middle;
  width: 60px;
  height: 60px;
  border-radius: 60%;
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
          <li class="active"> <a href="#">Home</a> </li>
          <li> <a href="https://codeforces.com/contests">Practice</a> </li>
          <li> <a href="contest.php"> Contest </a></li>
          <li> 
            <?php
            include("../connect.php");
            $username=$_SESSION['username'];
            $sql="select username,image from member_reg where username='$username'";
            $r=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($r);
            $name=$row['username'];
            $image=$row['image'];
            echo "<img src='../upload_image/$image' alt='Avatar' class='avatar'><a href='profile.php'>$username</a>" 
            ?>  
          </li>
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
      <h1>Become a true programming master.<br> <strong>Learn how to code and build efficient algorithms.</strong></h1>
      <p>A Platform for Aspiring Programmers
        "PUC Contest Arena" was created as a platform to help our university programmers make it big in the world of algorithms, computer programming, and programming contests. At "PUC Contest Arena" we work hard to revive the geek in you by hosting a programming contest at the start of the month and two smaller programming challenges at the middle and end of the month. We also aim to have training sessions and discussions related to algorithms, binary search, technicalities like array size and the likes. Apart from providing a platform for programming competitions, "PUC Contest Arena" also has various algorithm tutorials and forum discussions to help those who are new to the world of computer programming.</p>
      <a href="#" class="button">Challenge Now!!</a> </div>
  </div>
</div>


<hr>
<div id="content">
  <div class="wrap clearFix">
    <h2>Blogs & Topics</h2>
    <div class="clearFix">
      <div class="col floatLeft"> <img src="images/icon-programming.png" alt="" class="icon">
        <h3><a href="#" class="button">Compete and win</a></h3>
        <p>Participate in coding contests ranging from beginner level to week-long coding marathons..</p>
      </div>
      <div class="col floatRight"> <img src="images/icon-hackathon.png" alt="" class="icon">
        <h3><a href="#" class="button">Hackathons</a></h3>
        <p>Solve real-world social problems and business challenges. Win exciting rewards.</p>
      </div>
    </div>
    <div class="clearFix">
      <div class="col floatLeft"> <img src="images/icon-data.png" alt="" class="icon">
        <h3><a href="#" class="button">Data Science competitions</a></h3>
        <p>Analyze and work on a range of high-quality datasets. Put your Data Science skills to test every day.</p>
      </div>
      <div class="col floatRight"> <img src="images/icon-tools.png" alt="" class="icon">
        <h3><a href="#" class="button">Tutorials</a></h3>
        <p>Explore and add your first skill to get started. PUC  offers a variety of skills, tracks and tutorials for you to learn and improve.</p>
      </div>
    </div>
    
    <div class="buttonCentered"> <a href="https://www.ideone.com" class="button iconRight">Lets Code & compile <i class="more"></i></a> </div>
    <h2>WHAT GREAT PROGRAMMERS ARE SAYING</h2>
    <ul class="cols clearFix">
      <li>
        <p>“Talk is cheap. Show me the code.”</p>
        <p><strong>Linus Torvalds</strong>, Linux</p>
      </li>
      <li class="middle">
        <p>“Programs must be written for people to read, and only incidentally for machines to execute.”</p>
        <p><strong>Harold Abelson</strong>, Apple</p>
      </li>
      <li>
        <p>Programming is one of the most difficult branches of applied mathematics; the poorer mathematicians had better remain pure mathematicians.</p>
        <p><strong>Edsger Dijkstra</strong>, Algorithmist</p>
      </li>
    </ul>
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