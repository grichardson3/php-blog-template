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
</head>
<body>
	<?php if(!empty($message)){ echo $message;} ?>
	<form action="login.php" method="post">
		<label>Username:</label>
		<input type="text" name="username" value="">
		<br>
		<label>Password</label>
		<input type="password" name="password" value="">
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>

</body>
</html>