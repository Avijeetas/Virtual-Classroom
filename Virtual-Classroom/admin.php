<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="login_css.css">
  <link rel="stylesheet" type="text/css" href="admin_css.css">
</head>
<body class="adminbody" >
  <script type="bootstrap.min.jss"></script>
<div class="adminpanel">Admin Panel</div>
</br>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark navigation">

  <!-- Logo -->
  <img src="school_1.jpg" alt="Logo" style="width:40px;">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">User</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Calender</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="admin_teacher.php">Teacher</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Active User</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Notice</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Dropdown link
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a>
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li>
    <li>
    <div class="search">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    </div>
  </li>
  <li>
    <button class="btn btn-success" type="submit">Search</button>
  
</li>
  </ul>
</nav>
<div class="sidebar">
   <li ><a href="admin_teacher.php">Add new teachers</a></li>

    <li ><a href="register.php">Add new students</a></li>
    <li ><a href="start.php">logout</a></li>
    
  </div>

</body>
</html>