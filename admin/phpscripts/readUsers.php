<?php
	function getAllUsers($tbl) {
		include('phpscripts/connect.php');

		$queryAll = "SELECT * FROM {$tbl} ORDER BY user_id ASC";
		$runAll = mysqli_query($link, $queryAll);
		if($runAll){
			return $runAll;
		}else{
			$error = "There was a problem accessing this information.";
			return $error;
		}
		mysqli_close($link);
	}

	function getSingleUser($tbl, $col, $id) {
		include('phpscripts/connect.php');

		$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
		$runSingle = mysqli_query($link, $querySingle);
		if($runSingle){
			return $runSingle;
		}else{
			$error = "There was a problem accessing this information.";
			return $error;
		}
		mysqli_close($link);
	}
?>