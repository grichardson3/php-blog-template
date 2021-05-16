<?php
	// require_once('phpscripts/config.php');
	require_once('phpscripts/connect.php');
	require_once('phpscripts/sessions.php');
	require_once('phpscripts/read.php');
	confirm_logged_in();

	$id = 1;
	$tbl = "tbl_var";
	$col = "var_configId";
	$popForm = getSingle($tbl, $col, $id);
	$info = mysqli_fetch_array($popForm);

	// Redirect for low level admins
	if ($_SESSION['u_userlevel'] == 0) {
		header("Location: index.php");
		exit();
	}

	if(isset($_POST['submit'])){
		include_once('phpscripts/connect.php');

		$websiteTitle = trim($_POST['websitetitle']);
		$footerMessage = trim($_POST['footermessage']);
		$sliderOnHome = $_POST['slideronhome'];
		$contactOnHome = $_POST['contactonhome'];
		$darkMode = $_POST['darkmode'];
		$navColor = trim($_POST['navcolor']);
		$footerColor = trim($_POST['footercolor']);
		$buttonColor = trim($_POST['buttoncolor']);

		$sqlVar = "UPDATE tbl_var SET var_headerTitle = '$websiteTitle', var_footerMsg = '$footerMessage', var_includeSliderOnHome = '$sliderOnHome', var_includeContactOnHome = '$contactOnHome', var_navColor = '$navColor', var_footerColor = '$footerColor', var_buttonColor = '$buttonColor', var_darkMode = '$darkMode' WHERE tbl_var.var_configId = 1;";
		mysqli_query($link, $sqlVar);
		header("Location: dashboard.php?editTheme=success");
		exit();
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit Site Settings</title>
	<?php include_once("../includes/admin-meta.php") ?>
</head>
<body>
	<div class="container">
		<br><h2>Edit Site Settings</h2><br>
		<?php if(!empty($message)){echo $message;} ?>
		<form action="editTheme.php" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<label>Website Title:</label>
					<input class="form-control" type="text" name="websitetitle" value="<?php echo $info['var_headerTitle'];?>"><br>
				</div>
				<div class="col-xs-12 col-md-6">
					<label>Footer Message:</label>
					<input class="form-control" type="text" name="footermessage" value="<?php echo $info['var_footerMsg'];?>"><br>
				</div>
				<div class="col-xs-12 col-md-4">
					<label>Include Featured Image Slider on Home Page? 1 for Yes, 0 for No</label>
					<input class="form-control" type="text" name="slideronhome" value="<?php echo $info['var_includeSliderOnHome'];?>"><br>
				</div>
				<div class="col-xs-12 col-md-4">
					<label>Include Contact on Home Page? <br> 1 for Yes, 0 for No</label>
					<input class="form-control" type="text" name="contactonhome" value="<?php echo $info['var_includeContactOnHome'];?>"><br>
				</div>
				<div class="col-xs-12 col-md-4">
					<label>Enable Website Dark Mode? <br> 1 for Yes, 0 for No</label>
					<input class="form-control" type="text" name="darkmode" value="<?php echo $info['var_darkMode'];?>"><br>
				</div>
				<div class="col-xs-12 col-md-4">
					<label>Navigation Color</label>
					<input class="form-control" type="text" name="navcolor" value="<?php echo $info['var_navColor'];?>"><br>
				</div>
				<div class="col-xs-12 col-md-4">
					<label>Footer Color</label>
					<input class="form-control" type="text" name="footercolor" value="<?php echo $info['var_footerColor'];?>"><br>
				</div>
				<div class="col-xs-12 col-md-4">
					<label>Button Color</label>
					<input class="form-control" type="text" name="buttoncolor" value="<?php echo $info['var_buttonColor'];?>"><br>
				</div>
				<div class="col-xs-12 col-md-12">
					<button class="btn btn-secondary" type="submit" name="submit">Edit Site Settings</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>