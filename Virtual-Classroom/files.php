<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "registration");
  if(!$db)
    DIE (mysqli_error());
  // Initialize message variable
   
  // If upload button is clicked ...
  $image="";

  if (isset($_POST['upload'])) {
    // Get image name
 

    $image = $_FILES['image']['name'];
    if(empty($image))
    {
      echo "<script type='text/javascript'>alert('No image');</script>"; 

    }
    else{
         $temp = explode(".", $_FILES["image"]["name"]);
  $extension = end($temp);
  echo $extension;  
  
  $target = "images/".basename($image);
      echo "<script type='text/javascript'>alert($extension);</script>"; 

    $sql = "SELECT count(*) FROM images where image=$image";
    mysqli_query($db, $sql);


    echo $sql;
    if($sql>1)
    {
      echo "<script type='text/javascript'>alert('No image');</script>"; 
      header("location: files.php");
      exit(0);
    }
    else{


  $sql = "INSERT INTO images (image) VALUES ('$image')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target) ) {
      echo "<script type='text/javascript'>alert('No image');</script>"; 

    }else{
   echo "<script type='text/javascript'>alert('SRY');</script>"; 
      }
  
  


    }
    echo $msg;
      header("location: files.php");    

    }

    // Get text
    // image file directory

}

?>


<?php 
  session_start(); 

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
	<title>Home</title>
	
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="bootstrap.min.js"></script>
  <link rel="shortcut icon" href="fal.jpg"/>

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


    <link rel="stylesheet"  href="dist/emojionearea.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cardo" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<link href='http://fonts.googleapis.com/css?family=Quicksand:500' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="style.css" media="screen, handheld" />
<link rel="stylesheet" type="text/css" href="enhanced.css" media="screen  and (min-width: 40.5em)" />
  <script
  src="https://code.jquery.com/jqu
  ery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script type="text/javascript">

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
            }
      })

  </script>


  
<style type="text/css">
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
    width: 700px;
    height: AUTO;
    font-size: 15px;
     font-family: 'Zapf-Chancery';
    padding: 5px;
    margin: 20px auto;
    border: 3px solid #D69494;
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

   <a class="nav-link" href="#" style="font-size: 15px;">Download Corner</a>
   <a class="nav-link" href="rating.php" style="font-size: 15px;">Rating</a>
   <a class="nav-link" href="#" style="font-size: 15px;">My profile</a>
   
  <a href="#contact">Contact</a>
  <div class="topnav-right">
    <a class="nav-link" href="#" style="font-size: 15px;"> <img class="v" src="gravatar.png" line-height=2;/> <?php echo $_SESSION['username']; ?></a>
    <a class="nav-link" href="login.php" style="font-size: 15px;float:right;"> Logout </a>
  </div>
</div>


  <form method="POST" action="files.php" enctype="multipart/form-data"> 
  <input type="hidden" name="size" value="1000000"/>
  <div>
    <input type="file" name="image" id="txtar"/>
  </div>
        <button type="submit" name="upload"  class="btn btn-primary" id="txtar">POST</button>
  </form>

<div>
  <?php
    $result = mysqli_query($db, "SELECT * FROM images");
    while ($row = mysqli_fetch_array($result)) {
      $extension=$row['image'];
     $extension = (explode(".", $extension));
     $extension=end($extension);
      echo "<div id='img_div'><img src=images/".$row['image']." alt=".$row['image'].">";
      echo $row['image'];

      echo "</div>";
    }
  ?>
</div>
</body>

</html>