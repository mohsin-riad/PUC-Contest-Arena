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
        <h1>Pending request to the contest</h1>

        <?php
        include("../connect.php");
        $sql="select t_name,c_name from contest_request";
        $r=mysqli_query($con,$sql);
        echo "<table id='admin'>";
        echo "<tr>
        <th>ID</th>
        <th>Team Name</th>
        <th>Contest Name</th>
        </tr>";
        $cnt = 1;
        while($row=mysqli_fetch_array($r))
        {
        	$tname=$row['t_name'];
        	$cname=$row['c_name'];
            echo "<tr>
            <td>$cnt</td><td>$tname</td><td>$cname</td>
            </tr>";
            $cnt++;
        }
    	  echo "</table>";
      ?>

      </div>
    </div>
    <div class="buttonCentered">  <i class="more"></i></a> </div>
    <div class="wrap clearFix">
        <form action="approval.php" method="post">
            <fieldset>
                <div>
                    <h2>Approve Team to the contest</h2>
                    Select ID:<br>
                    <select type="text" class="text" name="t_name" >
                    <?php
                     include("../connect.php");
                     $sql="select  t_name from contest_request";
                     $cnt=1;
                     $r=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_array($r))
                        {
                            $tname=$row['t_name'];
                            echo "<option value='$tname'>$cnt</option>";
                            $cnt++;   
                        }
                    ?>
                    </select>
                    <br>
                    <br>
                <button type="submit" class="button iconLeft" id="submit" name="submit"><i class="email"></i>Approve Now</button>
            </fieldset>
        </form>
    </div>
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

<?php
include("../connect.php");
if(isset($_POST['submit']))
{
    $t_name=$_POST['t_name'];

    $sql1="select  t_name,c_name from contest_request where t_name='$t_name'";
    $r1=mysqli_query($con,$sql1);
    $row1=mysqli_fetch_assoc($r1);
    $t_name=$row1['t_name'];
    $c_name=$row1['c_name'];

    $sql2="select  t_id from teams where t_name='$t_name'";
    $r2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_assoc($r2);
    $t_id=$row2['t_id'];

    $sql3="select  c_id from contest_info where c_name='$c_name'";
    $r3=mysqli_query($con,$sql3);
    $row3=mysqli_fetch_assoc($r3);
    $c_id=$row3['c_id'];

    $query="insert into team_contest values('$t_id','$c_id','1')";
    if(mysqli_query($con,$query))
	{
        echo "Succesfully inserted !!";

        $lol = "DELETE FROM contest_request WHERE t_name='$t_name'";
        if(mysqli_query($con,$lol))
	    {
            echo "Succesfully Deleted !!";
        }
        else
	    {
		    echo mysqli_error();
        }
    }
	else
	{
		echo mysqli_error();
    }
}
 ?>