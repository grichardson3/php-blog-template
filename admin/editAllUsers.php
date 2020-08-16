<?php
	require_once('phpscripts/config.php');
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
?>
<!doctype html>
<html>
	<head>
		<title>Edit Post Details</title>
		<?php include_once("../includes/meta.php") ?>
	</head>
	<body>
		<?php
			$tbl = "tbl_users";
			$col = "user_id";
			$popForm = getSingle($tbl, $col, $id);
			$info = mysqli_fetch_array($popForm);
		?>

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