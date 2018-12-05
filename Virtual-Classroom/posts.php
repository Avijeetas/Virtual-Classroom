<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "registration");
  if(!$db)
    DIE (mysqli_error());
  // Initialize message variable
   session_start();
  // If upload button is clicked ...
  $image="";
  $id="";
    if (isset($_POST['upload'])) {
    // Get image name
 
    // Get text
  $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  $id=$_SESSION['username'];
  echo $id;
    // image file directory
  
  $sql = "INSERT INTO messages (id, message) VALUES ('$id', '$image_text')";
    // execute query
    $rs=mysqli_query($db, $sql);
    echo $rs;
      header("location: posts.php");    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>VClass</title>  
  <link rel="shortcut icon" href="fal.jpg"/>

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="style4.css"/>
  <link rel="stylesheet" href="style.css"/>

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

</head>

<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
    width: 500px;

    font-size:20px;
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
    height: auto;
    font-size: 15px;
    font-family: 'Zapf-Chancery';
    border: 1px;
    margin: 20px auto;
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   #nw
   {
    font-size: 20px;
    color: blue;

   }

   img{
    float: left;
    margin: 5px;
    width: 300px;
    height: 140px;
   }
   .txtar{
    margin-left: -115px;
   }
   .txtarp{
    margin-left: -125px;
    margin-top:55px;
    font-size:20px;
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

    margin-left: 0px;
   }

</style>
</head>
<body>

  

<div class="topnav">
   <a href="index.php" style="font-size: 15px">V.Class</a>
   <a class="nav-link" href="files.php" style="font-size: 15px;">Upload Corner</a>
   <a class="nav-link" href="#" style="font-size: 15px;">My profile</a>
      <?php
   if (substr_count($_SESSION['username'], 'cse_') ===0) {

       echo  '<a class="nav-link" href="rating.php">Rating</a>';         
       }

   ?>
   <a class="nav-link" href="#" style="font-size: 15px;">Teachers' Rating</a>
   
   <a href="posts.php">Post</a>
   <div class="topnav-right">
    <a class="nav-link" href="#" style="font-size: 15px;"> <img class="v" src="gravatar.png"/> <?php echo $_SESSION['username']; ?></a>
    <a class="nav-link" href="login.php" style="font-size: 15px;float:right;"> Logout </a>
  </div>
</div>
  <form method="POST" action="posts.php">
    
    <div>
      <textarea id="text" name="image_text" placeholder="" required="" minlength="1" cols="75" rows="6"></textarea>
    </div>
  
      <button type="submit" name="upload" class="btn btn-primary" id="txtar">POST</button>
  </form>

<div id="topnav">
  <?php
    $result = mysqli_query($db, "SELECT * FROM messages");
    while ($row = mysqli_fetch_array($result)) {
        
          echo "<div id='img_div'>";
   
           echo "<div><strong><font size = '3'>".$row['id']."</font></strong> : ".$row['date']."<br>
           <div id='nw'>".$row['message']."</div></div><br>";
        }
  ?>

</body>
 
</html>