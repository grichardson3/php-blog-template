<?php
	// require_once('phpscripts/config.php');
	require_once('phpscripts/read.php');
	require_once('phpscripts/sessions.php');
	confirm_logged_in();

	$id = 1;
	$tbl = "tbl_var";
	$col = "var_configId";
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
	<title>Edit Site Settings</title>
	<?php include_once("../includes/admin-meta.php") ?>
</head>
<body>
	<div class="container">
		<br><h2>Edit Site Settings</h2><br>
		<?php if(!empty($message)){echo $message;} ?>
		<form action="editTheme.php" method="POST" enctype="multipart/form-data">
			<label>Website Title:</label>
			<input class="form-control" type="text" name="websitetitle" value="<?php echo $info['var_headerTitle'];?>"><br>
			<label>Footer Message:</label>
			<input class="form-control" type="text" name="footermessage" value="<?php echo $info['var_footerMsg'];?>"><br>
			<label>Website Logo:</label>
			<input style="width: 97px;" type="file" name="websitelogo"><br><br>
			<label>Use Logo As Title?</label><br>
			<label>Yes</label><input type="radio" name="logoastitle" value="Yes">
			<label>No</label><input type="radio" name="logoastitle" value="No"><br><br>
			<label>Include Featured Image Slider on Home Page?</label><br>
			<label>Yes</label><input type="radio" name="slideronhome" value="Yes">
			<label>No</label><input type="radio" name="slideronhome" value="No"><br><br>
			<label>Include Contact Form on Home Page?</label><br>
			<label>Yes</label><input type="radio" name="contactonhome" value="Yes">
			<label>No</label><input type="radio" name="contactonhome" value="No"><br><br>
			<label>Enable Dark Mode?</label><br>
			<label>Yes</label><input type="radio" name="darkmode" value="Yes">
			<label>No</label><input type="radio" name="darkmode" value="No"><br><br>
			<label>Navigation Color</label>
			<input class="form-control" type="text" name="navcolor" value="<?php echo $info['var_navColor'];?>"><br>
			<label>Footer Color</label>
			<input class="form-control" type="text" name="footercolor" value="<?php echo $info['var_footerColor'];?>"><br>
			<label>Button Color</label>
			<input class="form-control" type="text" name="buttoncolor" value="<?php echo $info['var_buttonColor'];?>"><br>
			<button class="btn btn-secondary" type="submit" name="submit">Edit Site Settings</button>
		</form>
	</div>
</body>
</html>