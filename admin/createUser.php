<?php
	require_once('phpscripts/sessions.php');
	confirm_logged_in();

	if ($_SESSION['u_userlevel'] == 0) {
		header("Location: index.php");
		exit();
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Create User</title>
	<?php include_once("includes/admin-meta.php"); ?>
</head>
<body>
	<div class="container">
		<h2>Create User</h2>
		<div class="row">
			<form action="phpscripts/createUser.php" method="POST">
				<label>First Name:</label>
				<input class="form-control" type="text" name="firstname"><br>
				<label>Last Name:</label>
				<input class="form-control" type="text" name="lastname"><br>
				<label>Email:</label>
				<input class="form-control" type="text" name="email"><br>
				<label>Username:</label>
				<input class="form-control" type="text" name="username">
				<small>Username must only contain uppercase letters, lowercase letters, and numbers. No special characters allowed.</small><br><br>
				<label>Password:</label>
				<input class="form-control" type="password" name="password"><br>
				<button class="btn btn-secondary" type="submit" name="submit">Create User</button>
			</form>
		</div>
	</div>
</body>
</html>