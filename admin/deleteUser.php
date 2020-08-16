<?php
	require_once('phpscripts/readUsers.php');
	require_once('phpscripts/sessions.php');
	require_once('phpscripts/login.php');
	confirm_logged_in();

	$tbl = "tbl_users";
	$users = getAllUsers($tbl);
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Delete User</title>
	<?php include_once("../includes/meta.php") ?>
</head>
<body>
	<div class="container">
		<br><h1>Delete User</h1><br>
		<?php
			while($row = mysqli_fetch_array($users)){
				echo "<h3 style=\"line-height: 1;\">{$row['user_first']} {$row['user_last']}</h3><a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\"><small>Remove User</small></a><br><br><br>";
			}
		?>
	</div>
</body>
</html>