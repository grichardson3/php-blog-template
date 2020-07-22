<?php

session_start();

if (isset($_POST['submit'])) {

	include 'dbh.php';

	$userid = mysqli_real_escape_string($conn, $_POST['userid']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);

	// Error handlers
	// Check if inputs are empty

	if (empty($userid) || empty($pass)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_userid='$userid' OR user_email='$userid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=errooooor");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-Hashing the password
				$hashedPassCheck = password_verify($pass, $row['user_pass']);
				if ($hashedPassCheck == false) {
					header("Location: ../index.php?login=error");
					exit();
				} elseif ($hashedPassCheck == true) {
					// Lock in the user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_userid'] = $row['user_userid'];
					header("Location: ../index.php?login=success");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login=error");
	exit();
}