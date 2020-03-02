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
          <li class="active"> <a href="index.php">Home</a> </li>
          <li> <a href="#">Practice</a> </li>
          <li class="parent"> <a href="#">Compete</a>
            <ul>
              <li> <a href="#">Puc IT fest april 2019</a> </li>
              <li> <a href="#">NCPC team selection contest august 2019</a> </li>
              <li> <a href="#">CUET IT fest preli 2019 </a> </li>
            </ul>
          </li>
          <li> <a href="login.php">Login</a> </li>
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
      <a href="login.php" class="button">Sign Into Existing Account</a> </div>
  </div>
</div>

<div id="content">
    <div class="wrap clearFix">
        <form action="registration.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <div>
                    <h2>Registration</h2>
                
                        <input type="text" class="text" id="username" name="username" placeholder="User Name">
                        <br>
                        <input type="text" class="text" id="rname" name="rname" placeholder="Real Name">
                        <br>
                        <input type="text" class="text" id="university" name="university" placeholder="University">
                        <br>
                        <select  class="text" id="gender" name="gender" required>
                            <option selected hidden value="male">Select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                        <br>
                          Date Of Birth
                        <br>
                        <input type="date" class="text" id="b_date" name="b_date" placeholder="Date Of Birth"> 
                        <br>
                        <input type="text" class="text" id="email" name="email" placeholder="Email">
                        <br>
                        <input type="file"  class="text" id="fileToUpload" name="fileToUpload"><br> 
                        <br>
                        <input type="password"  class="text" id="password" name="password" placeholder="Password">
                        <br><br>
                        <input type="checkbox"  name="I Agree Terms & Condition">I Agree Terms & Condition</label>
                        <br>
                    <label for="email">Create an account.</label>
                        <button type="submit" class="button iconLeft" id="submit" name="submit"><i class="email"></i> Sign Up</button>
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
    $username = $_POST['username'];
    $rname = $_POST['rname'];
    $university = $_POST['university'];
    $b_date = $_POST['b_date'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $num=rand(10,100);
    $m_id="m-".$num;
    
    $ext= explode(".",$_FILES['fileToUpload']['name']); 
    $c=count($ext);
    $ext=$ext[$c-1];
    $date=date("D:M:Y");
    $time=date("h:i:s");
    $image_name=md5($date.$time.$username);
    $image=$image_name.".".$ext;

    $query="insert into member_reg values('$m_id','$username','$rname','$university','$gender','$b_date','$email','$image','$password','0')";
    if(mysqli_query($con,$query))
	  {
      echo "Succesfully inserted !!";
      move_uploaded_file($_FILES['fileToUpload']['tmp_name'],"upload_image/$image");
	  }
	  else
	  {
	  	echo mysqli_error();
	  }
}
 ?>