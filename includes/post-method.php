<?php 
	require_once("admin/connect.php");
	if (isset($_POST['name'])) {
	    $name = $_POST['name'];
	    $email = $_POST['email'];
	    $subject = $_POST['subject'];
	    $message = $_POST['message'];
	    $direct = "thankyou.php";
	    $sendMail = submitMessage($name, $email, $subject, $message, $direct);
	}
?>