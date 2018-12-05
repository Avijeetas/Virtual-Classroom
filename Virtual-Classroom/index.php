<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: start.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: start.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>

<body class="index_body">
  <script type="bootstrap.min.js"></script>
<div class="index_header">
  <img src="cuet_logo.png" title="logo" width="150px" height="200px" alt="logo" class="logo" style="margin-right: 250px;" />
	<h2 style="color: black;font-size: 44px;margin-right: 430px;" class="index_h2">V.Class</h2>
</div>

<marquee direction="left" scrollamount="3" class="marquee"><font color="red">Welcome to our page.If you have any query please contact to our email addess.</font></marquee>



<!--nav class="navbar navbar-expand-sm bg-dark navbar-dark navigation nav">

  <ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" href="#" style="font-size: 15px;">Download Corner</a>
  </li>
    <li class="nav-item">
      <a class="nav-link" href="#" style="font-size: 15px;">My profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="rating.php" style="font-size: 15px;">Rating</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="#" style="font-size: 15px;">Teachers Profile</a>
    </li>

   
 
    <li class="nav navbar-nav navbar-right"> 
        <a class="nav-link" href="#" style="font-size: 15px;"> Welcome <?php echo $_SESSION['username']; ?></a>
    </li>
    <li>
          <a class="nav-link" href="login.php" style="font-size: 15px;float:right;"> Logout </a></li>
</div>

	 

  </ul>
</nav-->
<div class="topnav">
   <a href="#" style="font-size: 15px">V.Class</a>
   <a class="nav-link" href="files.php" style="font-size: 15px;">Upload Corner</a>

   



   <a class="nav-link" href="myone.php" style="font-size: 15px;">My profile</a>

  
   <?php
   if (substr_count($_SESSION['username'], 'cse_') ===0) {

       echo  '<a class="nav-link" href="rating.php">Rating</a>';         
       }

   ?>

   
   <a href="posts.php">Post</a>
   <div class="topnav-right">
    <a class="nav-link" href="#" style="font-size: 15px;"> <img class="v" src="gravatar.png"/> <?php echo $_SESSION['username']; ?></a>
    <a class="nav-link" href="start.php" style="font-size: 15px;float:right;"> Logout </a>
  </div>
</div>

</body>
</html>