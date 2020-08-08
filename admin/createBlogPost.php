<?php
	require_once('phpscripts/sessions.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
	<title>Create Post</title>
	<?php include_once("../includes/admin-meta.php"); ?>
</head>
<body>
	<div class="container">
		<br><h2>Create Post</h2><br>
		<form action="phpscripts/addPost.php" method="POST">
			<label>Post Title:</label>
			<input class="form-control" type="text" name="title">
			<br>
			<label>Post Content:</label>
			<textarea class="form-control" type="text" name="content"></textarea>
			<br>
			<button class="btn btn-secondary" type="submit" name="submit">Create Post</button>
		</form>
	</div>
</body>
</html>