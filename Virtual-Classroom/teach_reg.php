<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
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
  	  <label><font style="color:white">Teacher's Name</font><font style="color: red">*</font></label>
  	  <input type="text" placeholder="Teacher" name="username" value="<?php echo $teachername; ?>">
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
      <label><font style="color:white">Qualification</font><font style="color: red">*</font></label>
      <input type="qualification" placeholder="email-address" name="qualification" value="<?php echo $qualification; ?>">
    </div>

    <div class="form-group">
      <label><font style="color:white">dept</font><font style="color: red">*</font></label>
      <input type="email" placeholder="email-address" name="email" value="<?php echo $department; ?>">
    </div>
    
     <form method="POST" action="files.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file" name="avatar">
    </div>
 
  	<div class="form-group">
  	  <label><font style="color:white">Password</font><font style="color: red">*</font></label>
  	  <input type="password" placeholder="password" name="password_1">
  	</div>
  	<div class="form-group">
  	  <label><font style="color:white">Confirm password</font><font style="color: red">*</font></label>
  	  <input type="password" placeholder="confirm password" name="password_2">
  	</div>


  	  <button type="submit" class="btn btn-success btn-block" name="register">Register</button>
  	
  	<p style="font-size: 20px;">
  		Already a member? <a href="start.php"><div class="text-center" style="font-size: 20px;">Login</a>
  	</p>
  </form>
</div>
<div class="col-md-4 col-sm-4 col-xs-12"></div>
</div>
</div>
</body>
</html>