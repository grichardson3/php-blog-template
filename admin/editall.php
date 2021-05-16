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
		<?php include_once("includes/admin-meta.php") ?>
	</head>
	<body>
		<?php
			$tbl = "posts";
			$col = "posts_id";
			$id = $_GET['id'];
			echo single_edit($tbl, $col, $id);
		?>
	</body>
</html>