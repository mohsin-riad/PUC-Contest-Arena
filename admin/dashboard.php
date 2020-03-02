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
<link rel="stylesheet" href="table.css">
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
<footer class="wrap clearFix">
<div id="content">
  
    <h1>Contestant information</h1>
        <?php
        include("../connect.php");
        
        $sql="select m_id,username,real_name,university,gender,b_date,email from member_reg";
        $r=mysqli_query($con,$sql);
        echo "<table id='admin'>";
        echo "<tr>
        <th>Member ID</th>
        <th>User Name</th>
        <th>Full Name</th>
        <th>University</th>
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Email</th>
        </tr>";
        while($row=mysqli_fetch_array($r))
        {
            $id=$row['m_id'];
        		$name=$row['username'];
        		$rname=$row['real_name'];
        		$university=$row['university'];
        		$gender=$row['gender'];
        		$dob=$row['b_date'];
        		$email=$row['email'];
            echo "<tr>
            <td>$id</td><td>$name</td><td>$rname</td><td>$university</td><td>$gender</td><td>$dob</td><td>$email</td>
            </tr>";
        }
    	  echo "</table>";
      ?>
  </div>
  </div>
    <div class="buttonCentered">  <i class="more"></i></a> </div>
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
</div>

<footer class="clearFix">
  <div class="wrap clearFix">
    <p class="floatRight"> Copyright &copy; 2019 <a href="https://www.facebook.com/mdmohsin.riad">Mohsin Riad</a> &ndash; All Rights Reserved<br>
    <p class="socialIcons"> <a href="https://www.facebook.com/mdmohsin.riad" class="facebook">Facebook</a> <a href="https://github.com/mohsin-riad" class="twitter">Github</a> </p>
  </div>
</footer>
</body>
</html>
