<?php
	require_once('phpscripts/read.php');
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

	$tbl = "posts";
	$getPosts = getAll($tbl);
?>
<!doctype html>
<html>
<head>
	<title>All Posts</title>
	<?php include_once("../includes/admin-meta.php") ?>
</head>
<body>
	<div class="container">
		<br><h1>All Blog Posts</h1><br>
		<?php
			if(!is_string($getPosts)){
				while($row = mysqli_fetch_array($getPosts)){
					echo "<h2>{$row['posts_postheader']}</h2>
						<p style=\"line-height: 1.5em; margin: 0;\">{$row['posts_user']}</p>
						<small style=\"padding-top: .5em;\">{$row['posts_date']} - </small>
						<small><a style=\"margin-top: .5em;\" href=\"editall.php?id={$row['posts_id']}\">Edit Post Details</a></small><br><br>
					";
				}
			}else{
				echo "<p class=\"error\">{$getPosts}</p>";
			}
		?>
	</div>
</body>
</html>