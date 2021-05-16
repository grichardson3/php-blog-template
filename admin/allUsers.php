<?php
	require_once('phpscripts/readUsers.php');
	require_once('phpscripts/sessions.php');
	require_once('phpscripts/functions.php');
	confirm_logged_in();

	/*if(isset($_GET['filter'])){
		$tbl = "tbl_movies";
		$tbl2 = "tbl_genre";
		$tbl3 = "tbl_mov_genre";
		$col = "movies_id";
		$col2 = "genre_id";
		$col3 = "genre_name";
		$filter = "action";
		$getMovies = filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter);
	}else{
		$tbl = "tbl_movies";
		$getMovies = getAll($tbl);
	}*/

	$tbl = "tbl_users";
	$getUsers = getAllUsers($tbl);

	if ($_SESSION['u_userlevel'] == 0) {
		header("Location: index.php");
		exit();
	}
?>
<!doctype html>
<html>
<head>
	<title>All Users</title>
	<?php include_once("includes/admin-meta.php") ?>
</head>
<body>
	<div class="container">
		<br><h1>All Users</h1><br>
		<?php
			if(!is_string($getUsers)){
				while($row = mysqli_fetch_array($getUsers)){
					echo "<h3>{$row['user_userid']}</h3>
						<p style=\"line-height: 1.5em; margin: 0;\">{$row['user_email']}</p>
						<p style=\"padding-top: .5em;\">{$row['user_first']} {$row['user_last']}</p>
						<small><a style=\"color: salmon;\" href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\">Remove User</a></small><br><br><br>
					";
				}
			}else{
				echo "<p class=\"error\">{$getUsers}</p>";
			}
		?>
	</div>
</body>
</html>