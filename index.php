<?php
	include_once 'header.php';
	include_once 'timeElapsedCalculator.php';
	include 'includes/dbh.inc.php';

?>

<div class="posts">
 	<?php
		
		$sql = "SELECT * FROM jaro_164222_newsposts3 ORDER BY likes DESC;";
		$result = mysqli_query($conn, $sql);
		

		
		echo '<table border="0" cellpadding="0" cellspacing="0"><tbody>';
		while ($row = mysqli_fetch_array($result)) {

			$timeElapsed = calculateTime($row['time']);

			echo '<tr class="titleRow onePost">';
			echo '<td><a href="openPostPage.php?id=' . $row["id"] . '">' . $row["title"] . '</a><a id="upvote" href="likes.php?id=' . $row["id"] . '&like=1">' . 
				' + </a><a id="downvote" href="likes.php?id=' . $row["id"] . '&like=-1"> - </a><br>';
			echo '<span id="authorRow">Posted by <strong>' . $row["username"] . '</strong> | <i>' . $timeElapsed . '</i> | Score: ' . $row['likes'] . '</span></td></tr>';
		}'<button type="submit" name="submit" onclick="window.location=' . "'register.php';" . '">Register</button>';
		echo '</tbody></table';
	?> 
	</div>
</div>
</body>

</html>