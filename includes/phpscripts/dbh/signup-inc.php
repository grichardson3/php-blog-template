<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$userid = mysqli_real_escape_string($conn, $_POST['userid']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);

	// Error Handlers
	// Check for empty fields

	if (empty($first) || empty($last) || empty($email) || empty($userid) || empty($pass)) {
		header("Location: ../signUp.php?signup=empty");
		exit();
	} else {
		// Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			header("Location: ../signUp.php?signup=invalid");
			exit();
		} else {
			// Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signUp.php?signup=email");
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE user_userid='$userid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../signUp.php?signup=usertaken");
					exit();
				} else {
					// Hashing the password
					$hashedPass = password_hash($pass, PASSWORD_DEFAULT);
					// Insert the user into the database
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_userid, user_pass) VALUES ('$first', '$last', '$email', '$userid', '$hashedPass');";
					mysqli_query($conn, $sql);
					header("Location: ../signUp.php?signup=success");
					exit();
				}
			}
		}
	}

} else {
	header("Location: ../signUp.php");
	exit();
}