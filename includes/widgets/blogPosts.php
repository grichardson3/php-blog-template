<?php
	require_once('admin/phpscripts/functions.php');

	$tbl = "posts";
    $getPosts = getAll($tbl);

    function getAll($tbl) {
		include('admin/phpscripts/connect.php');

		$queryAll = "SELECT * FROM {$tbl} ORDER BY posts_id DESC";
		$runAll = mysqli_query($link, $queryAll);
		if($runAll){
			return $runAll;
		}else{
			$error = "There was a problem accessing this information.";
			return $error;
		}
		mysqli_close($link);
	}
?>
<section style="padding-top: 6em; padding-bottom: 6em;">
    <div class="row">
        <?php
            if(!is_string($getPosts)){
                while($row = mysqli_fetch_array($getPosts)){
                    echo "<div class=\"col-xs-12\">
                            <h2>{$row['posts_postheader']}</h2>
                            <p style=\"line-height: 1.5em; margin: 0;\">{$row['posts_user']}</p>
                            <small style=\"padding-top: .5em;\">{$row['posts_date']}</small>
                            <p>{$row['posts_content']}</p>
                        </div>
                    ";
                }
            }else{
                echo "<p class=\"error\">{$getPosts}</p>";
            }
        ?>
    </div>
</section>