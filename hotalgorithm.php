<?php
	include_once 'header.php';
	include 'includes/dbh.inc.php';
	include_once 'timeElapsedCalculator.php';
	
	
	function hot($likes, $date) {
		$timeSinceSubmission = ((strtotime(date('Y-m-d H:i:s')) - strtotime($date)) / 3600);
		return $likes / pow($timeSinceSubmission+2, 1.8);
	}
	
?>

<div class="posts">
 	<?php
	
		$sql = "SELECT * FROM jaro_164222_newsposts3";
		$result = mysqli_query($conn, $sql);
		$newArray = array();
		echo '<table border="0" cellpadding="0" cellspacing="0"><tbody>';
		$counter = 0;
		while ($row = mysqli_fetch_array($result)) {
			$row['score'] = hot($row['likes'], $row['time']);
			array_push($newArray, $row);
		}

		function sortByScore($a, $b)
		{
		    $a = $a['score'];
		    $b = $b['score'];

		    if ($a == $b) return 0;
		    return ($a < $b) ? -1 : 1;
		}

		usort($newArray, 'sortByScore');


		for ($x = count($newArray) - 1; $x >= 0; $x--) {
			
			$row = $newArray[$x];
			$timeElapsed = calculateTime($row['time']);


			echo '<tr class="titleRow onePost">';
			echo '<td><a href="openPostPage.php?id=' . $row["id"] . '">' . $row["title"] . '</a><a id="upvote" href="likes.php?id=' . $row["id"] . '&like=1">' . 
				' + </a><a id="downvote" href="likes.php?id=' . $row["id"] . '&like=-1"> - </a><br>';
			echo '<span id="authorRow">Posted by <strong>' . $row["username"] . '</strong> | <i>' . $timeElapsed . '</i> | Score: ' . $row['likes'] . '</span></td></tr>';
		}
		echo '</tbody></table';
	?> 
	</div>
</div>
</body>

</html>

