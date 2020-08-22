<?php
    include_once("phpscripts/sessions.php");
    confirm_logged_in();

    $id = $_SESSION['u_id'];

    if(isset($_POST['submit'])){
        include_once 'phpscripts/connect.php';
        $password = $_POST['password'];

		if ($password == "") {
			header("Location: updatePassword.php?updatePassword=empty-credentials");
			exit();
		} else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $createUserSQL = "UPDATE tbl_users SET user_pass = '$hashedPassword' WHERE tbl_users.user_id = '$id';";
            mysqli_query($link, $createUserSQL);
            header("Location: caller.php?caller_id=logout");
            exit();
		}
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Update Password</title>
	<?php include_once("../includes/admin-meta.php"); ?>
</head>
<body>
	<div class="container">
		<br><h2>Update User Password</h2><br>
		<?php if(!empty($message)){echo $message;} ?>
		<form action="updatePassword.php" method="POST">
			<label>Update Password:</label>
			<input class="form-control" type="password" name="password" value=""><br>
			<button class="btn btn-secondary" type="submit" name="submit">Update Password</button>
		</form>
	</div>
</body>
</html>