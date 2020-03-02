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
<script>
$(window).load(function () {
    $(".trigger_popup_fricc").click(function(){
       $('.hover_bkgr_fricc').show();
    });
    $('.hover_bkgr_fricc').click(function(){
        $('.hover_bkgr_fricc').hide();
    });
    $('.popupCloseButton').click(function(){
        $('.hover_bkgr_fricc').hide();
    });
});
</script>
<style>
.avatar {
  vertical-align: middle;
  width: 60px;
  height: 60px;
  border-radius: 60%;
}

.hover_bkgr_fricc{
    background:transparent;
    cursor:pointer;
    display:none;
    height:100%;
    position:fixed;
    text-align:center;
    top:0;
    width:100%;
    z-index:10000;
}
.hover_bkgr_fricc .helper{
    display:inline-block;
    height:100%;
    vertical-align:middle;
}
.hover_bkgr_fricc > div {
    background-color: #e5e5e5;
    box-shadow: 10px 10px 60px #555;
    display: inline-block;
    height: auto;
    max-width: 180px;
    min-height: 100px;
    vertical-align: middle;
    width: 60%;
    position: relative;
    border-radius: 8px;
    padding: 15px 5%;
}
.popupCloseButton {
    background-color: #fff;
    border: 3px solid #999;
    border-radius: 50px;
    cursor: pointer;
    display: inline-block;
    font-family: arial;
    font-weight: bold;
    position: absolute;
    top: -20px;
    right: -20px;
    font-size: 25px;
    line-height: 30px;
    width: 30px;
    height: 30px;
    text-align: center;
}
.popupCloseButton:hover {
    background-color: #ccc;
}
.trigger_popup_fricc {
    cursor: pointer;
    font-size: 20px;
    margin: 20px;
    display: inline-block;
    font-weight: bold;
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
        <div class="clearFix">
              <h1>All Upcomming Contest.</h1>
              <button type="submit" class="button iconLeft" id="submit" name="submit"><i class="email"></i>
              <a class="trigger_popup_fricc">My Team</a></button>
              <div class="hover_bkgr_fricc">
                  <span class="helper"></span>
                  <div>
                      <div class="popupCloseButton">X</div>
                      <?php
                      include("../connect.php");
                      $username=$_SESSION['username'];
                      $sql="select  t_name,m_id1,m_id2,m_id3 from teams where m_id1='$username' or m_id2='$username' or m_id3='$username' ";
                      $r=mysqli_query($con,$sql);
                      $row=mysqli_fetch_assoc($r);

                      $name1=$row['m_id1'];
                      $name2=$row['m_id2'];
                      $name3=$row['m_id3'];
                      $tname=$row['t_name'];
                      if($tname)
                      {
                        echo "<h3>team name:</h3><h2>$tname</h2><h3>member:</h3><h2>$name1</h2><h2>$name2</h2><h2>$name3</h2>";
                      }
                      else
                      {
                        echo "<h3>Not Enrolled in any Team</h3>";
                      }
                      ?> 
                  </div>
              </div>
        </div>
    </div>
  </div>
</div>
<hr>
<div id="content">
  <div class="wrap clearFix">
    
       <h2>Contest.</h2>
        <?php
        include("../connect.php");
        $sql="select c_name,contest_date FROM `contest_info`";
        $r=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($r))
        {
          $name=$row['c_name'];
          $cd=$row['contest_date'];
          echo "<p>Name</p><a href='#' class='button'>$name</a><p>Date</p><h2>$cd</h2>";
        }
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