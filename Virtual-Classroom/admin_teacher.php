
<?php 
  
  include 'server.php';

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
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="register_css.css">
  <script type="bootstrap.min.css"></script>
<style type="text/css">
  #ex{
  }

</style>  
</head>
<body bo>
  <div class="container-fluid bg">
    <div class="row">
       <div class="col-md-4 col-sm-4 col-xs-12"></div>
         <div class="col-md-4 col-sm-4 col-xs-12">
  <form method="post" action="admin_teacher.php" class="form_container">
<?php include('errors.php'); ?>
    

    <h1 class="text-center" style="color:white">Register</h1>
    <div style="text-align: justify"> 
        <div class="form-group" >
      <label><font style="color:white">Teacher's Name</font><font style="color: red">*</font></label>
      <input type="text" placeholder="teacher" name="teachername" value="<?php echo $teachername; ?>">
    </div>

    <div class="form-group">
      <label><font style="color:white">Username</font><font style="color: red">*</font></label>
      <input type="text" placeholder="username" name="username" value="<?php echo $username; ?>">
    </div>


    <div class="form-group">
      <label><font style="color:white">Email</font><font style="color: red">*</font></label>
      <input type="email" placeholder="email-address" name="email" value="<?php echo $email; ?>">
    </div>
      <div class="form-group">
      <label><font style="color:white">Designation</font><font style="color: red">*</font></label>
      <input type="text" placeholder="Designation" name="designation">
    </div>

    <div class="form-group">
      <label><font style="color:white">department</font><font style="color: red">*</font></label>
      <input type="text" placeholder="dept" name="department">
    </div>
    
    <div class="form-group">
      <label><font style="color:white">Password</font><font style="color: red">*</font></label>
      <input type="password" placeholder="password" name="password_1">
    </div>
    <div class="form-group">
      <label><font style="color:white">Confirm password</font><font style="color: red">*</font></label>
      <input type="password" placeholder="confirm password" name="password_2">
    </div>


      <button type="submit" class="btn btn-success btn-block" name="reg">Register</button>
    </div>
  </form>

</div>
</div>
</div>
</body>
</html>