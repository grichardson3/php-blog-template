<?php
    if(isset($_POST['submit'])){
		include_once 'connect.php';

		$firstname = mysqli_real_escape_string($link, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($link, $_POST['lastname']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$password = mysqli_real_escape_string($link, $_POST['password']);
        
		$userBio = "I am not interesting at all. Nothing to see here.";
		$userProfilePic = $_FILES['profilepic'];
		$levelList = 0;

		if ($firstname == "" || $lastname == "" || $email == "" || $username == "" || $password == "") {
			header("Location: ../createUser.php?createUser=empty");
			exit();
		} else {
			// include_once 'connect.php';
			// include_once 'sessions.php';
			if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname) || !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
				header("Location: ../createUser.php?createUser=invalid-credentials");
				exit();
			} else {
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: ../createUser.php?createUser=email-invalid");
					exit();
				} else {
					$usernameTakenVal = "SELECT * FROM tbl_users WHERE user_userid = '$username'";
					$result = mysqli_query($link, $usernameTakenVal);
					$resultCheck = mysqli_num_rows($result);
					if ($resultCheck > 0) {
						header("Location: ../createUser.php?createUser=user-taken");
						exit();
					} else {
						/*if($cover['type'] == "image/jpg" || $cover['type'] == "image/jpeg" || $cover ['type'] == "image/png"){
							$targetpath = "../img/{$cover['name']}";
							if(move_uploaded_file($cover['tmp_name'], $targetpath)){
								$th_copy = "../img/thumb/TH_{$cover['name']}";
								if(!copy($targetpath, $th_copy)){
									$message = "Error copying file.";
									return $message;
								}else{
									echo "File transfer complete";
								}
							}
						}else{
							echo "Could not add photo.";
						}*/
						$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
						$createUserSQL = "INSERT INTO tbl_users (user_userid, user_email, user_pass, user_first, user_last, user_bio, user_userlevel) VALUES ('$username', '$email', '$hashedPassword', '$firstname', '$lastname', '$userBio', '$levelList');";
						mysqli_query($link, $createUserSQL);
                        header("Location: ../dashboard.php?createUser=success");
						exit();
					}
				}
			}
		}
	}
?>