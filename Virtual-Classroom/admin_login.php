<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="login_css.css">
</head>
<body >
  <div class="container-fluid bg">
  <script type="bootstrap.min.jss"></script>
  <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12"></div>
  <div class="col-md-4 col-sm-4 col-xs-12">
     
  <form method="post" action="admin_login.php" class="form_container">
    <?php include('errors.php'); ?>
    <h1 class="text-center "style="color:white">Admin Login</h1>
    <div class="form-group">
        <label><font style="color:white">Username</font></label>
        <input type="text" name="username" >
    </div>
    <div class="form-group">
        <label><font style="color: white">Password</font></label>
        <input type="password" name="password" >
    </div>
    
        <button type="submit" class="btn btn-success btn-block" name="login_admin">Login</button><br>
              <a href="start.php"><div class="text-center" style="font-size: 20px;color:aqua"><b>Home page</b></div></a></form></br>

  </form>
</div>
<div class="col-md-4 col-sm-4 col-xs-12"></div>
</div>
</div>
</body>
</html>