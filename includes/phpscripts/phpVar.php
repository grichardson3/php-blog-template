<?php
	function getAllVar($tblVar){
		// include("/admin/phpscripts/connect.php");
		$url = "localhost";
		$user = "root";
		$pass = "";
		$db = "db_blogtemplate";
		
		//$link = mysqli_connect($url, $user, $pass, $db, "8889"); //Mac
		$link = mysqli_connect($url, $user, $pass, $db); //PC
		
		/* check connection */ 	
		if(mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		
		$varQuery = "SELECT * FROM tbl_var";
		$varQueryRun = mysqli_query($link, $varQuery);
		if($varQueryRun){
			return $varQueryRun;
		}else{
			$error = "There was a problem accessing this info";
			return $error;
		}
		mysqli_close($link);
	}

	$tblVar = "tbl_var";
	$getVar = getAllVar($tblVar);

	if(!is_string($getVar)){
		while($row = mysqli_fetch_array($getVar)){
			// Copy Variables
			$headerTitle = $row['var_headerTitle'];
			$footerMsg = $row['var_footerMsg'];
			$logo = $row['var_logo'];

			$logoAsTitle = $row['var_logoAsTitle'];
			if($logoAsTitle == 1){
				$logoAsTitle = true;
			}else if($logoAsTitle == 0){
				$logoAsTitle = false;
			}

			$includeSliderOnHome = $row['var_includeSliderOnHome'];
			if($includeSliderOnHome == 1){
				$includeSliderOnHome = true;
			}else if($includeSliderOnHome == 0){
				$includeSliderOnHome = false;
			}

			$includeContactOnHome = $row['var_includeContactOnHome'];
			if($includeContactOnHome == 1){
				$includeContactOnHome = true;
			}else if($includeContactOnHome == 0){
				$includeContactOnHome = false;
			}

			// Colours
			$navColor = $row['var_navColor'] . " !important";
			$footerColor = $row['var_footerColor'] . " !important";
			$buttonColor = $row['var_buttonColor'];

			// Dark Theme Toggle
			$darkMode = $row['var_darkMode'];
			if($darkMode == 1){
				$darkMode = true;
			}else if($darkMode == 0){
				$darkMode = false;
			}

			// Font Options
			$fontFamilyParagraph = "'" . $row['var_fontFamilyP'] . "'" . ", sans-serif";
			$fontFamilyHeading = "'" . $row['var_fontFamilyH'] . "'" . ", sans-serif";
		}
	}	
?>