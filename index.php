<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<title>Gareth Richardson Media</title>
		<?php include_once("includes/meta.php") ?>
		<?php include_once("includes/post-method.php") ?>
	</head>
	<body>
		<div id="container">
			<!--Navigation-->
			<section>
				<h2 class="hidden">Navigation</h2>
				<?php include_once("includes/nav.php"); ?>
			</section>
			<?php
				if ($includeSliderOnHome === true) {
					include_once("includes/widgets/landingSlider.php");
				}
			?>
			<?php
				if ($includeContactOnHome === true) {
					include_once("includes/widgets/contactForm.php");
				}
			?>
			<!--Footer-->
			<section>
				<h2 class="hidden">Footer</h2>
				<?php include_once("includes/footer.php"); ?>
			</div>
		</div>
		<!--Scripts-->
		<?php include_once("includes/scripts.php") ?>
	</body>
</html>