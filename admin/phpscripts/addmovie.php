<?php
	
	function addMovie($cover, $title, $date, $desc, $director, $genre) {
		include('connect.php');
		if($cover['type'] == "image/jpg" || $cover['type'] == "image/jpeg"){
			$targetpath = "../images/{$cover['name']}";

			if(move_uploaded_file($cover['tmp_name'], $targetpath)){
				//echo "File transfer complete";
			$th_copy = "../images/thumb/TH_{$cover['name']}";
				if(!copy($targetpath, $th_copy)){
					$message = "Whoops, that didn't work.";
					return $message;
				}

				//Add to database
				$qstring = "INSERT INTO tbl_movies VALUES(NULL,'{$title}','{$cover['name']}','{$date}','{$desc}','{$director}','{$genre}')";
				//echo $qstring;
				$result = mysqli_query($link, $qstring);
				if($result){
					$qstring2 = "SELECT * FROM tbl_movies ORDER BY movies_id DESC LIMIT 1";
					$result2 = mysqli_query($link, $qstring2);

					$row = mysqli_fetch_array($result2);
					$lastID = $row['movies_id'];
					//echo $lastID;

					$qstring3 = "INSERT INTO tbl_moviesgenre VALUES(/*NULL, FOR AI ID*/{$lastID}, {$genre})";
					$result3 = mysqli_query($link, $qstring3);
				}
				redirect_to("admin_index.php");
			}

			//$size = getimagesize($targetpath);
			//echo $size[2];

		}else{
			echo "Could not add movie";
		}
		mysqli_close($link);
	}
?>