<?php
	// require_once("config.php");
	require_once("connect.php");
	require_once("sessions.php");
	require_once("user.php");

	if(isset($_GET['caller_id'])){
		$dir = $_GET['caller_id'];
		if($dir == "logout"){
			logged_out();
		}else if($dir == "delete") {
			$id = $_GET['id'];
			deleteUser($id);
		} else if ($dir == "deletePost") {
			$id = $_GET['id'];
			deletePost($id);
		}else{
			echo "Caller id was passed incorrectly.";
		}
	}
?>