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
	<?php include_once("../includes/admin-meta.php") ?>
</head>
<body>
	<div class="container">
		<?php if(!empty($message)){ echo $message;} ?>
		<form action="login.php" method="post">
			<div class="row">
				<div class="col-xs-12">
					<input class="form-control" type="text" name="username" placeholder="Username">
				</div>
			</div><br>
			<div class="row">
				<div class="col-xs-12">
					<input class="form-control" type="password" name="password" placeholder="Password">
				</div>
			</div>
			<div class="row">
				<button class="btn btn-secondary" type="submit" name="submit">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>