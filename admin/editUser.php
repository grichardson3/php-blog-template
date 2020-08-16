<?php
	// require_once('phpscripts/config.php');
	require_once('phpscripts/read.php');
	require_once('phpscripts/sessions.php');
	confirm_logged_in();

	$id = $_SESSION['u_id'];
	$tbl = "tbl_users";
	$col = "user_id";
	$popForm = getSingle($tbl, $col, $id);
	$info = mysqli_fetch_array($popForm);

	if(isset($_POST['submit'])){
		include_once 'phpscripts/connect.php';
		// $password = trim($_POST['password']);
		$username = trim($_POST['username']);
		$firstname = trim($_POST['firstname']);
		$lastname = trim($_POST['lastname']);
		$userBio = trim($_POST['bio']);
		$userProfilePic = trim($_POST['userprofilepic']);

		if ($firstname == "" || $lastname == "") {
			header("Location: editUser.php?editUser=empty");
			exit();
		} else {
			if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname) || !preg_match("/^[a-zA-Z0-9]{4,25}*$/", $username)) {
				header("Location: editUser.php?editUser=invalid-credentials");
				exit();
			} else {
				$usernameTakenVal = "SELECT * FROM tbl_users WHERE user_userid = '$username'";
				$result = mysqli_query($link, $usernameTakenVal);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck > 0) {
					header("Location: editUser.php?editUser=user-taken");
					exit();
				} else {
					// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
					$createUserSQL = "UPDATE tbl_users SET user_first = '$firstname', user_last = '$lastname', user_bio = '$userBio' WHERE tbl_users.user_id = '$id';";
					mysqli_query($link, $createUserSQL);
					header("Location: dashboard.php?createUser=success");
					exit();
				}
			}
		}
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit Profile</title>
	<?php include_once("../includes/admin-meta.php") ?>
</head>
<body>
	<div class="container">
		<br><h2>Edit Profile</h2><br>
		<?php if(!empty($message)){echo $message;} ?>
		<form action="editUser.php" method="POST">
			<label>First Name:</label>
			<input class="form-control" type="text" name="firstname" value="<?php echo $info['user_first'];?>"><br>
			<label>Last Name:</label>
			<input class="form-control" type="text" name="lastname" value="<?php echo $info['user_last'];?>"><br>
			<label>Username:</label>
			<input class="form-control" type="text" name="username" value="<?php echo $info['user_userid'];?>"><br>
			<label>Bio:</label>
			<input class="form-control" type="text" name="bio" value="<?php echo $info['user_bio'];?>"><br>
			<button class="btn btn-secondary" type="submit" name="submit">Edit Profile</button>
		</form>
	</div>
</body>
</html>