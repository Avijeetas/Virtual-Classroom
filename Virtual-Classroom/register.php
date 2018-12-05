<?php include('server.php') 

?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system</title>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="register_css.css">
</head>
<body>
  <script type="bootstrap.min.css"></script>
  <div class="container-fluid bg">
    <div class="row">
       <div class="col-md-4 col-sm-4 col-xs-12"></div>
         <div class="col-md-4 col-sm-4 col-xs-12">

  <form method="post" action="register.php" class="form_container">
  	<?php include('errors.php'); ?>
    <h1 class="text-center" style="color:white">Register</h1>
  	<div class="form-group">
  	  <label><font style="color:white">Username</font><font style="color: red">*</font></label>
  	  <input type="text" placeholder="username" name="username" value="<?php echo $username; ?>">
  	</div>
    <div class="form-group">
      <label><font style="color:white">Student Name</font><font style="color: red">*</font></label>
      <input type="text" placeholder="name" name="name" value="<?php echo $Name; ?>">
    </div>

  	<div class="form-group">
  	  <label><font style="color:white">Email</font><font style="color: red">*</font></label>
  	  <input type="email" placeholder="email-address" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="form-group">
  	  <label><font style="color:white">Password</font><font style="color: red">*</font></label>
  	  <input type="password" placeholder="password" name="password_1">
  	</div>
  	<div class="form-group">
  	  <label><font style="color:white">Confirm password</font><font style="color: red">*</font></label>
  	  <input type="password" placeholder="confirm password" name="password_2">
  	</div>

  	  <button type="submit" class="btn btn-success btn-block" name="reg_user">Register</button>
  	
  
  </form>
</div>
<div class="col-md-4 col-sm-4 col-xs-12"></div>
</div>
</div>
</body>
</html>