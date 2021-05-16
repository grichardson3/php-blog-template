<?php
	include_once('functions.php'); // Import to use redirect_to()
	session_start();

	function confirm_logged_in() {
		if(!isset($_SESSION['u_id'])){
			redirect_to("login.php");
		}
	}

	function logged_out() {
		session_destroy();
		redirect_to("login.php");
	}
?>