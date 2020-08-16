<?php
	function getAllUsers($tbl) {
		$user = "root";
		$pass = "";
		$url = "localhost";
		$db = "db_blogtemplate";
		
		//$link = mysqli_connect($url, $user, $pass, $db, "8889"); //Mac
		$link = mysqli_connect($url, $user, $pass, $db); //PC
		
		/* check connection */ 	
		if(mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}

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
		// include('phpscripts/connect.php');
		$user = "root";
		$pass = "";
		$url = "localhost";
		$db = "db_blogtemplate";
		
		//$link = mysqli_connect($url, $user, $pass, $db, "8889"); //Mac
		$link = mysqli_connect($url, $user, $pass, $db); //PC
		
		/* check connection */ 	
		if(mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}

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

	/*function filterType($tbl1, $tbl2, $tbl3, $col1, $col2, $col3, $filter) {
		include('phpscripts/connect.php');

		$filterQuery = "SELECT * FROM {$tbl1}, {$tbl2}, {$tbl3} WHERE {$tbl1}.{$col1} = {$tbl3}.{$col1} AND {$tbl2}.{$col2} = {$tbl3}.{$col2} AND {$tbl2}.{$col3}='{$filter}'";
		//echo $filterQuery;
		$runQuery = mysqli_query($link, $filterQuery);

		if($runQuery){
			return $runQuery;
		}else{
			$error = "There was a problem accessing this information.";
			return $error;
		}
		mysqli_close($link);
	}*/
?>