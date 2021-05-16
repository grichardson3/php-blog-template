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
	<div class="container" id="loginPage">
		<?php if(!empty($message)){ echo $message;} ?>
		<div class="loginCon">
			<h1 style="margin-left: -16px; margin-bottom: 16px; font-weight: 700; font-size: 56px;">Login</h1>
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
				</div><br>
				<div class="row">
					<button class="btn btn-secondary" type="submit" name="submit">Login</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>