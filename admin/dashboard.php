<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
    require_once("phpscripts/config.php");
    confirm_logged_in();
?>
<!doctype html>
<html>
<head>
	<title>Dashboard Page</title>
	<?php include_once("../includes/admin-meta.php") ?>
</head>
<body>
	<div class="container">
		<br><h2><?php echo $_SESSION['u_userid'];?></h2><br>
		<div id="posts">
			<h3>Posts</h3>
			<a href="blogPosts.php">All Posts</a><br>
			<a href="createBlogPost.php">Create Post</a><br>
		</div>
		<?php
			if($_SESSION['u_userlevel'] == 1){
				echo "<br>
				<div id=\"users\">
					<h3>Users</h3>
					<a href=\"allUsers.php\">All Users</a><br>
					<a href=\"createUser.php\">Create User</a><br>
					<a href=\"editUser.php\">Edit Profile</a><br>
					<a href=\"deleteUser.php\">Delete User</a><br>
				</div>
				<br>
				<div id=\"themeCustomization\">
					<h3>Theme Customization</h3>
					<a href=\"editTheme.php\">Edit Theme</a><br>
				</div>";
			}
		?>
		<br>
		<a href="caller.php?caller_id=logout">Sign Out</a><br>
	</div>
</body>
</html>