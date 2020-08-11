<?php
	require_once('phpscripts/sessions.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Create User</title>
	<?php include_once("../includes/admin-meta.php") ?>
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
				<input class="form-control" type="text" name="username"><br>
				<label>Password:</label>
				<input class="form-control" type="password" name="password"><br>
				<button class="btn btn-secondary" type="submit" name="submit">Create User</button>
			</form>
		</div>
	</div>
</body>
</html>