<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$Name="";
$teachername="";
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');


// REGISTER USER
 if (isset($_POST['reg'])) 
   {$teachername=mysqli_real_escape_string($db,$_POST['teachername']);
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $qualification=mysqli_real_escape_string($db,$_POST['designation']);
        $department=mysqli_real_escape_string($db,$_POST['department']);


        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
        

    if (empty($username)) { array_push($errors, "Username is required"); }
   if (empty($email)) { array_push($errors, "Email is required"); }
   if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
    }
  $user_check_query = "SELECT * FROM teacher WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
    {
          //copy image to image folder
    

   
        $images="images/".$username.".jpg";
        {
            $_SESSION['teachername']=$teachername;
          $_SESSION['image']=$images; 
          $query="INSERT INTO teacher(teachername,username,email,designation,department,image,password)
        VALUES('$teachername','$username','$email','$qualification','$department','$images','$password')" ;

    mysqli_query($db, $query);
    header('location: admin.php');
        }
   
}
}
}
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $Name = mysqli_real_escape_string($db, $_POST['name']);

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (name,username, email, password) 
  			  VALUES('$Name','$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// ... 
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
if (isset($_POST['login_usert'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM teacher WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}


//admin login

if (isset($_POST['login_admin'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {

    if($username=='admin' && $password==12345678)
      $results=1;
    if (($results) === 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: admin.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

//teacher profile

//$db=mysqli_connect('localhost','root','','registration');
//if($_SERVER['REQUEST_METHOD']=='POST'){
        //make sure file type is image
          

          

//Rating for user
if (isset($_POST['rate_submit'])){
  $name = mysqli_real_escape_string($db, $_POST['teachername']);
  $rate = mysqli_real_escape_string($db, $_POST['rate']);
  $sql="INSERT INTO rating(teacher_name,rate)"
        ."VALUES('$name','$rate')" ;

          
          if(mysqli_query($db,$sql)==true){
            $_SESSION['message']="Rating successful . Added $rating to the database.";
            header("location:index.php");
          }
          else{
            $_SESSION['message']="Rating failed.Could not add to the database.";
            header("location:index.php");
          }
}

?>