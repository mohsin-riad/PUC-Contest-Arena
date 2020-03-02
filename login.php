<?php
session_start();
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
<style> 
    
.open-button {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 120px20;
}

.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}
.form-container .cancel {
  background-color: #767373;
}

.form-container .btn:hover, .open-button:hover {
  opacity: 1;
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
          <li class="active"> <a href="index.php">Home</a> </li>
          <li> <a href="#">Practice</a> </li>
          <li class="parent"> <a href="#">Compete</a>
            <ul>
              <li> <a href="#">Puc IT fest april 2019</a> </li>
              <li> <a href="#">NCPC team selection contest august 2019</a> </li>
              <li> <a href="#">CUET IT fest preli 2019 </a> </li>
            </ul>
          </li>
          <li> <a href="registration.php">Sign-up</a> </li>
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
      <a href="registration.php" class="button">SIGN UP & Start Coding</a> </div>
  </div>
</div>

<div id="content">
    <div class="wrap clearFix">
        <form action="login.php"  method="post" class="form-container">
            <fieldset>
                <h1 align="center">Login :</h1>
                <div>
                    <div>
                        <h2> Login</h2>
                        <label for="email"><b>ID</b></label>
                        <input type="text" class="text" placeholder="Your User ID" name="username" required>
                        <label ><b>Password</b></label>
                        <input type="password" class="text" placeholder="Enter Password" name="password" required>
                        <button type="submit" id="submit" name="submit" class="btn">Login</button>
                        <input type="checkbox" >remember password</label>
                    </div>
                </div>
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
include("connect.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="select username, password from admin where username='$username' and password='$password'";
  $sql1="select username, password from member_reg where username='$username' and password='$password'";
  $sql2="select username, password from coach where username='$username' and password='$password'";
            $r=mysqli_query($con,$sql);
            $r1=mysqli_query($con,$sql1);
            $r2=mysqli_query($con,$sql2);
            if(mysqli_num_rows($r)==1)
            {
                $_SESSION['username']=$username;
                $_SESSION['admin_login_status']="loged in";
                header("Location:admin/admin_home.php");
            }
            
            else if(mysqli_num_rows($r1)==1)
            {
                $_SESSION['username']=$username;
                $_SESSION['member_login_status']="loged in";
                header("Location:contestant/contestant_home.php");
            }
            else if(mysqli_num_rows($r2)==1)
            {
                $_SESSION['username']=$username;
                $_SESSION['coach_login_status']="loged in";
                header("Location:coach/coach_home.php");
            }
            else
            {
                echo "<p style='color: red;'>Incorrect UserId or Password</p>";
            }
}
?>