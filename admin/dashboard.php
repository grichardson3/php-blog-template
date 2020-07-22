<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
    require_once("phpscripts/config.php");
    confirm_logged_in();
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dashboard Page</title>
</head>
<body>
	<h2><?php echo $_SESSION['u_userid'];?></h2>
	<div id="posts">
		<h3>Posts</h3>
		<a href="blogPosts.php">All Posts</a><br>
		<a href="createBlogPost.php">Create Post</a><br>
	</div>
	<div id="users">
		<h3>Users</h3>
		<a href="createUser.php">Create User</a><br>
		<a href="admin_edituser.php">Edit User</a><br>
		<a href="admin_deleteuser.php">Delete User</a><br>
	</div>
	<div id="themeCustomization">
		<h3>Theme Customization</h3>
		<a href="editTheme.php">Edit Theme</a><br>
		<a href="googleAnalyticsConfig.php">Configure Google Analytics</a><br>
	</div>
	<br>
	<a href="caller.php?caller_id=logout">Sign Out</a><br>
</body>
</html>