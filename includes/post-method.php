<?php 
	require_once("includes/phpscripts/dbh/config.php");
	if (isset($_POST['name'])) {
	    $name = $_POST['name'];
	    $email = $_POST['email'];
	    $subject = $_POST['subject'];
	    $message = $_POST['message'];
	    $direct = "thankyou.php";
	    $sendMail = submitMessage($name, $email, $subject, $message, $direct);
	}
?>