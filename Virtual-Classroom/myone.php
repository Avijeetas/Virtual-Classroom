<?php 
  session_start(); 
  $db = mysqli_connect("localhost", "root", "", "registration");
  if(!$db)
    DIE (mysqli_error());

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  height: auto;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

   #content{
    width: 150px;
    height: 100px;
    margin-left: 120px;
    margin: 20px auto;
    border: 1px solid #cbcbcb;
    margin-top:50px;
   }
   form{
    width: 50%;
    margin: 20px auto;
   }
   form div{
    margin-top: 5px;
   }
   #img_div{
    width: 80%;
    margin-left: 125px;  
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #cbcbcb;
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
   }

   img{
    float: left;
    margin: 5px;
    width: 300px;
    height: 140px;
   }
   .txtar{
    margin-left: 115px;
   }
   .txtarp{
    margin-left: 125px;
   }
   .icon
   {
    width: 10px;
    height: 10px;
   }
  input[type="file"] {
    display: block;
    margin-top:50px;
 margin-left: -126px;
color: brown; }
    #txtar{

    margin-left: 125px;
   }

</style>
</head>

<body>

<div class="topnav">
     <a href="index.php" style="font-size: 15px">V.Class</a>

   <a class="nav-link" href="files.php" style="font-size: 15px;">Upload Corner</a>
      <?php
   if (substr_count($_SESSION['username'], 'cse_') ===0) {

       echo  '<a class="nav-link" href="rating.php">Rating</a>';         
       }

   ?>
 <a class="nav-link" href="#" style="font-size: 15px;">My profile</a>
   
  <a href="#contact">Contact</a>
  <div class="topnav-right">
    <a class="nav-link" href="#" style="font-size: 15px;"> <img class="v" src="gravatar.png" line-height=2;/> <?php echo $_SESSION['username']; ?></a>
    <a class="nav-link" href="login.php" style="font-size: 15px;float:right;"> Logout </a>
  </div>
</div>
  

<div class="card">
    <?php
   if(substr_count($_SESSION['username'], 'cse_') >0)
   {


    $result = mysqli_query($db, "SELECT * FROM teacher");
    while ($row = mysqli_fetch_array($result)) {
      if($_SESSION['username']==$row['username'])
      echo "<img src=images/".$row['username'].".jpg ' style='width:80%;margin-left:30px;height:50%;'><center><br><b>".$row['username']."</b><br><div style='text-align:justify;margin-left:10px' ><b>Name: </b>".$row['teachername']."<br/>
        <b>Email: </b>".$row['email']."</br><b>Designation: </b>".$row['designation']."</br><b>Dept: </b>".$row['department']."</br><b>Rating: </b>".$row['rates']."</br><b>Votes: </b>".$row['vots']."</br>



    </div>";
    }
    }
    else {
          $result = mysqli_query($db, "SELECT * FROM users");

 while ($row = mysqli_fetch_array($result))
  {
    if($_SESSION['username']==$row['username'])
    echo "<img src=images/gravatar.png><br><div><b>".$row['username']."</b><br><div style='text-align:justify;margin-left:10px' ><b>Name: </b>".$row['Name']."<br/><b>Roll No: </b>".$row['username']."</br><b>Email: </b>".$row['email']."</br></div></div>";

  }

    }
  ?>
</div>

</div>

</body>
</html>
