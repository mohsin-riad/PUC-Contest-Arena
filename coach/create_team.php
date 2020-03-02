<?php
    session_start();
    if($_SESSION['coach_login_status']!="loged in" and ! isset($_SESSION['username']) )
    header("Location:../index.php");
     
    if(isset($_GET['sign']) and $_GET['sign']=="out") {
	  $_SESSION['coach_login_status']="loged out";
	  unset($_SESSION['username']);
    header("Location:../index.php");    
    }
?>


<!DOCTYPE html>
<html>
<head>
<title>PUC CONTEST ARENA || SIGN UP</title>
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
          <li> <a href="create_team.php">Create Team</a> </li>
          <li> <a href="remove_team.php">Remove Team</a> </li>
          <li> <a href="team_contest.php">contest assign</a> </li>
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
    <h1><strong>Coach Administration.</strong></h1>
  </div>
</div>
<hr>
<div id="content">
    <div class="wrap clearFix">
        <form action="create_team.php" method="post">
            <fieldset>
                <div>
                    <h2>Create Team</h2>
                        <input type="text" class="text" id="tname" name="tname" placeholder="Team Name">
                        <br>
                        Contestant 1:<br>
                        <select class="text" name="member1" >
                        <?php
                         include("../connect.php");
                         $sql="select distinct username from member_reg where status='0'";
                         $r=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($r))
                            {
                                $id=$row['username'];
                                echo "<option value='$id'>$id</option>";
                                 
                            }
                        ?>
                        </select>
                        <br>
                        Contestant 2:<br>
                        <select class="text" name="member2">
                        <?php
                         include("../connect.php");
                         $sql="select distinct username from member_reg where status='0'";
                         $r=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($r))
                            {
                                $id=$row['username'];
                                echo "<option value='$id'>$id</option>";
                                
                            }
                        ?>
                        </select>
                        <br>
                        Contestant 3:<br>
                        <select class="text" name="member3">
                        <?php
                         include("../connect.php");
                         $sql="select distinct username from member_reg where status='0'";
                         $r=mysqli_query($con,$sql);
                            
                            while($row=mysqli_fetch_array($r))
                            {
                                $id=$row['username'];
                                echo "<option value='$id'>$id</option>";
                                
                            }
                        ?>
                        </select>
                        <br>
                        <button type="submit" class="button iconLeft" id="submit" name="submit"><i class="email"></i>Create Now</button>
            </fieldset>
        </form>
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

<?php
include("../connect.php");
if(isset($_POST['submit']))
{
    $username=$_SESSION['username'];
    $tname = $_POST['tname'];
    $m1 = $_POST['member1'];
    $m2 = $_POST['member2'];
    $m3 = $_POST['member3'];
    $num = rand(10,100);
    $t_id = "t-".$num;
    $query="insert into teams values('$t_id','$username','$tname','$m1','$m2','$m3')";
    if(mysqli_query($con,$query))
	  {
      echo "Succesfully inserted !!";
      $query1 = "UPDATE member_reg SET status='1' WHERE username='$m1'";
      $query3 = "UPDATE member_reg SET status='1' WHERE username='$m3'";
      $query2 = "UPDATE member_reg SET status='1' WHERE username='$m2'";
      $tmp = mysqli_query($con,$query1);
      $tmp1 = mysqli_query($con,$query2);
      $tmp2 = mysqli_query($con,$query3);
	  }
	  else
	  {
		  echo mysqli_error();
    }
}
 ?>
