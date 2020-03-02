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
          <li> <a href="remove_team.php">Remove Teams</a> </li>
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
        <form action="remove_team.php" method="post">
            <fieldset>
                <div>
                    <h2>Remove Enrolled Team</h2>
                        Select Team:<br>
                        <select type="text" class="text" id="tname" name="tname" >
                        <?php
                         include("../connect.php");
                         $sql="select  t_name,m_id1,m_id2,m_id3 from teams";
                         $r=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($r))
                            {
                                $cname1=$row['m_id1'];
        		                $cname2=$row['m_id2'];
        		                $cname3=$row['m_id3'];
                                $tname=$row['t_name'];
                                echo "<option value='$tname'>$tname</option>";   
                            }
                        ?>
                        </select>
                        <br>
                        <br>
                        <button type="submit" class="button iconLeft" id="submit" name="submit"><i class="email"></i>Remove Now</button>
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
    $tname = $_POST['tname'];
    $lol = "DELETE FROM teams WHERE t_name='$tname'";
    if(mysqli_query($con,$lol))
	{
        echo "Succesfully Deleted !!";
        $query1 = "UPDATE member_reg SET status='0' WHERE username='$cname1'";
        $query3 = "UPDATE member_reg SET status='0' WHERE username='$cname2'";
        $query2 = "UPDATE member_reg SET status='0' WHERE username='$cname3'";
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
