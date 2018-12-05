<!DOCTYPE html>
<html lang="en">
<head>
	<title>Document</title>

	<link rel="stylesheet" href="style.css"/>
		<link rel="stylesheet"  href="dist/emojionearea.css">

	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
</head>
<style>
body
{
	background-color:#b3b3b3;
}
</style>
<body>
	<?php
		session_start();
		//$_SESSION['username']="Avijeet";
	//	
		if(isset($_SESSION['username'])==0)
		{
	//	
		$_SESSION['msg'] = "You must log in first";
  	//
  			header('location: login.php');
		}


	//	echo var_dump($_SESSION['username'])	
	?>
		<p align="right">Welcome <strong><?php echo $_SESSION['username']; ?></strong><br/>
  	 <a href="login.php?logout='1'" style="color: red;">logout</a> </p>

        <br/>
			<h1 align="Center">Welcome To <img src="cg.png" height="30px" width="30px">Box</h1>
<br>
	<div id="wrapper">
		
		<div class="chat_wrapper">
			<div id="chat"></div>
			<form method="POST" id="messageFrm"> 
				<textarea name="message"  cols="30" rows="7" class="textarea"></textarea>
			</form>
		</div>

	</div>

	<script>
	LoadChat();

	setInterval(function(){
		LoadChat();
	},1000);
		function LoadChat() {
			$.post('handlers/messages.php?action=getMessages',function(response){
				var scrollpos=$('#chat').scrollTop();
				var scrollpos=parseInt(scrollpos)+520;
				var scrollHeight=$('#chat').prop('scrollHeight');
				$('#chat').html(response);
				if(scrollpos<scrollHeight)
				{

				}
				else
				$('#chat').scrollTop($('#chat').prop('scrollHeight'));
			});
		};

		$('.textarea').keyup(function(e)
		{
			var message=$('.textarea').val();
			
			if(e.which==13)
			{	$('form').submit();}
		});
		$('form').submit(function(){
			var message=$('.textarea').val();
			$.post('handlers/messages.php?action=sendMessage&message='+message,function(response)
			{
				if(response==1)
				{	
					document.getElementById('messageFrm').reset();
					
					//LoadChat();
					}
			});
						return false;
			<!--In order to prevent reload-->
		});

		
	</script>
</body>

</html>