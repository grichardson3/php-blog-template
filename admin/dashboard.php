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
		<br>
			<h2>
				<?php include_once("phpscripts/date-checker.php"); ?>
				<?php echo $_SESSION['u_first'];?>!
			</h2>
		<br>
		<div class="row">
			<div class="col-xs-12 col-md-2">
				<div id="posts">
					<h3>Posts</h3>
					<a href="blogPosts.php">All Posts</a><br>
					<a href="createBlogPost.php">Create Post</a><br>
				</div>
			</div>
			<?php
				if($_SESSION['u_userlevel'] == 1){
					echo "
					<div class=\"col-xs-12 col-md-2\">
						<div id=\"users\">
							<h3>Users</h3>
							<a href=\"editUser.php\">Edit Profile</a><br>
							<a href=\"updatePassword.php\">Update Password</a><br><br>
							<a href=\"allUsers.php\">All Users</a><br>
							<a href=\"createUser.php\">Create User</a><br>
						</div>
					</div>
					<div class=\"col-xs-12 col-md-4\">
						<div id=\"themeCustomization\">
							<h3>Theme Customization</h3>
							<a href=\"editTheme.php\">Edit Theme</a><br>
						</div>
					</div>";
				}else{
					echo "
					<div class=\"col-xs-12 col-md-2\">
						<div id=\"users\">
							<h3>Users</h3>
							<a href=\"editUser.php\">Edit Profile</a><br>
							<a href=\"updatePassword.php\">Update Password</a><br>
						</div>
					</div>";
				}
			?>
			<div>
				<a href="caller.php?caller_id=logout" class="btn btn-danger">Sign Out</a><br>
			</div>
		</div>
	</div>
</body>
</html>