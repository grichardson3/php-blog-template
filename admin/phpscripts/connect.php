<?php
	// Set up connection credentials
	$url = "localhost";
	$user = "root";
	$pass = "";
	$db = "db_blogtemplate";
	
	//$link = mysqli_connect($url, $user, $pass, $db, "8889"); //Mac
	$link = mysqli_connect($url, $user, $pass, $db); //PC
	
	/* check connection */ 	
	/*if(mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}*/
?>