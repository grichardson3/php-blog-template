<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<?php
	if ($gtagID) {
		echo "<script> 
		window.dataLayer = window.dataLayer || []; 
		function gtag() {
			dataLayer.push(arguments);
		} 
		gtag('js', new Date());
		gtag('config'," . "'" . $gtagID . "'" . ");
		</script>";
	}
?>