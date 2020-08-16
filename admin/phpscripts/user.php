<?php
	function createUser($username, $email, $password, $firstName, $lastName, $userBio, $levelList) {
		include_once 'phpscripts/connect.php';
		include_once 'phpscripts/sessions.php';
		if (!preg_match("/^[a-zA-Z]*$/", $firstName) || 
			!preg_match("/^[a-zA-Z]*$/", $lastName)
			/*!preg_match("/^[a-zA-Z0-9]{4,25}*$/", $username)*/
			) {
			header("Location: createUser.php?createUser=invalid-credentials");
			exit();
		} else {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: createUser.php?createUser=email-invalid");
				exit();
			} else {
				$usernameTakenVal = "SELECT * FROM tbl_users WHERE user_userid = '$username'";
				$result = mysqli_query($link, $usernameTakenVal);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck > 0) {
					header("Location: createUser.php?createUser=user-taken");
					exit();
				} else {
					$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
					$createUserSQL = "INSERT INTO tbl_users (user_id, user_userid, user_email, user_pass, user_first, user_last, user_bio, user_profilepic, user_userlevel) VALUES (NULL, '$username', '$email', '$hashedPassword', '$firstName', '$lastName', '$userBio', NULL, '$levelList');";
					$result = mysqli_query($link, $createUserSQL);
					header("Location: dashboard.php?createUser=success");
				}
			}
		}
		// mysqli_close($link);
	}

	function editUser($id, $fname, $username, $password, $email) {
		include('phpscripts/connect.php');
		
		$updatestring = "UPDATE tbl_user SET user_fname='{$fname}', user_name='{$username}', user_pass='{$password}', user_email='{$email}' WHERE user_id={$id}";
		$updatequery = mysqli_query($link, $updatestring);

		if($updatequery) {
			redirect_to("admin_index.php");
		}else{
			$message = "Error editing user.";
			return $message;
		}

		mysqli_close($link);
	}

	function deleteUser($id) {
		include('connect.php');
		$delstring = "DELETE FROM tbl_users WHERE user_id = {$id}";
		$delquery = mysqli_query($link, $delstring);
		if($delquery) {
			header("Location: ../dashboard.php?deleteUser=success");
		}else{
			$message = "Error deleting user.";
			return $message;
		}
		mysqli_close($link);
	}
?>