<?php
	function addPost($username, $date, $title, $content){
		$user = "root";
		$pass = "";
		$url = "localhost";
		$db = "db_blogTemplate";
		
		$link = mysqli_connect($url, $user, $pass, $db);

		$qstring = "INSERT INTO tbl_posts VALUES(NULL,'{$username}','{$date}','{$title}','{$content}');";
		$result = mysqli_query($link, $qstring);
		if($result){
			echo "New post made successfully";
		}
		mysqli_close($link);
		redirect_to("dashboard.php");
	}
?>