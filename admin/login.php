<?php
	require_once("phpscripts/config.php");
	if(isset($_POST['submit'])){
		//echo "Works";
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username !== "" && $password !== ""){
			$result = logIn($username, $password);
			$message = $result;
		}else{
			$message = "Please fill out the required fields.";
		}
	}
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<?php include_once("../includes/meta.php") ?>
</head>
<body>
	<div class="container">
		<?php if(!empty($message)){ echo $message;} ?>
		<form action="login.php" method="post">
			<div class="row">
				<div class="col-xs-12">
					<label>Username:</label>
					<input class="form-control" type="text" name="username" value="">
				</div>
				<br><br>
				<div class="col-xs-12">
					<label>Password:</label>
					<input class="form-control" type="password" name="password" value="">
				</div>
				<input type="submit" name="submit" value="Submit">
			</div>
		</form>
	</div>
</body>
</html>