<?php
    require_once('admin/phpscripts/read.php');
	require_once('admin/phpscripts/functions.php');

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