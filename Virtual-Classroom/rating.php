<?php include('server.php') ?>
<?php
$link=mysqli_connect("localhost","root","","registration");
	if(isset($_POST['submit']))
	{
		$rate=$_POST['rates'];
		$tcr=$_POST['tc'];
		
	$sql2 = "UPDATE `teacher` SET `rates` = (`rates`+$rate)/(vots+1),vots=vots+1 WHERE teachername = '$tcr'";
		$sql3 = mysqli_query($link,$sql2);	
	}

?>

<!DOCTYPE html>
<html>
<head>
<title>Rating</title>
<link rel="stylesheet" type="text/css" href="rating_css.css">
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body class="body">
	<script type="bootstrap.min.js"></script>
	<div class="container-fluid">
		<div class="col-md-4 col-sm-4 col-xs-12"></div>
	<h1 style="color: red; font-weight:bold;text-align: center; ">Student Feedback</h1><br><br><br><br><br><br><br>
	<div class="rate_form">
	<form action="rating.php" method="post" class="form_container">
		<?php include('errors.php'); ?>
		<div class="teacher">
			<p style="margin-right: 600px;font-weight: bold;padding:5px ;color: #F1E7E1;">Teacher Name</p>
		<select name="tc">
			<option>Select any name</option>

			<?php
            $res=mysqli_query($db,"select teachername from teacher");
            while($row=mysqli_fetch_array($res)){
            	?>
              <option> <?php echo $row{"teachername"}; ?> </option>
            	<?php
            }
			?>
			
		</select></div>

		<br/><br/>
		<div class="rate">
<p style="margin-right: 600px;font-weight: bold;padding:5px 5px;color: #F1E7E1;">Rate</p>			<form method="post">

		<select name="rates" muptiple="yes">
			<option>Select any value</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
</select><br><br><br>

</div>
<div class="submit"><button type="submit" class="btn btn-success btn-block" name="submit" >Submit</button></div>
	</form>
</div>
	<div class="col-md-4 col-sm-4 col-xs-12"></div>
</div>
<footer class="footer"><a href="index.php">Back</a></footer>
</body>
</html>