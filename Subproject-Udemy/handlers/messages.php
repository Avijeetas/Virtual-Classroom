<?php
#
include('../config.php');
//		session_start();

	switch ($_REQUEST['action']) {
		case "sendMessage":
			# code...
			
#		
		session_start();
		
		$query=$db->prepare("INSERT INTO messages SET user=?,message=?");
#	if()
		$run=$query->execute([$_SESSION['username'],$_REQUEST['message']]);
		if($run)
		{
			echo 1;
			exit;
		}	
		break;
		
		case "getMessages":
		session_start();
		
		$query=$db->prepare("SELECT * from  messages");
#	if()
		
		$run=$query->execute();
		
		
		$rs=$query->fetchAll(PDO::FETCH_OBJ);
		$us=($_SESSION['username']);		
		
		$chat='';
		foreach ($rs as $message) {
			# code...
			if($message->user==$us)
			$chat .='<div class="me"> <strong>'.$message->user.'</strong></p><br/>'.$message->message.'</div>';
			else
			$chat .='<div class="him" ><strong>'.$message->user.'</strong></p><br/>'.$message->message.'</div>';

		}

				echo $chat;

			# code...
			break;
	}
?>
