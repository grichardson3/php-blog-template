<?php
	include_once 'connect.php';
	include_once 'sessions.php';

	$user = $_SESSION['u_userid'];
	$date = date('F j, Y');
	$title = $_POST['title'];
	$content = $_POST['content'];
	$featureImage = $_FILES['featureimage'];

	$sql = "INSERT INTO posts (posts_user, posts_date, posts_postheader, posts_content) VALUES ('$user','$date','$title','$content');";

	// Form Validation

	if(isset($_POST['submit'])){
		if($title == "" || $content == ""){
			$message = "Please fill out the required fields.";
			header("Location: ../createBlogPost.php?createPost=error");
		}else{
			$result = mysqli_query($link, $sql);
			header("Location: ../dashboard.php?createPost=success");
		}
	}
?>