<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
	include_once 'timeElapsedCalculator.php';

	$id = htmlspecialchars($_GET["id"]);
	$id = mysqli_real_escape_string($conn, $id);


	$sql = "SELECT * FROM jaro_164222_newsposts3 WHERE id='$id';";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);

?>

<div class="postContainer">
	<div class="insidePostTitle">
		<?php
			$timeElapsed = calculateTime($row['time']);
			echo $row['title'] . '<br>';
			echo '<span class="insidePostAuthorRow">Posted by ' . '<strong>' . $row['username'] . '</strong> | <i>' . $timeElapsed . '</i></span><br><hr>';
		?>
	</div>
	
	<div class="insidePostText">
		<?php
			
			echo $row['text'] . '<br>';
			if (substr($row["filename"], -1) != '.') {
				echo '<img src="uploads/'.$row["filename"].'">';
			}
		?>
	</div>
</div>

<?php
	$sql = "SELECT * from jaro_164222_commentsforposts3 WHERE postid='$id';";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		
		$timeElapsed = calculateTime($row['time']);
		echo '<div class="singleComment">';
		echo '<div id="singleCommentTop">' . $row['username'] . ' | ' . $timeElapsed . '</div>';
		echo '<div id="singleCommentBot">' . $row['comment'] . '</div></div>'; 
	}
	
	if (isset($_SESSION['u_id'])) {
		echo '<form action="includes/postcomment.inc.php?id=' . $id . '" method="POST">';
		echo '<textarea name="commentTextArea" id="textAreaForComments" placeholder="Enter your comment here..."></textarea><br>';
		echo '<button id="postCommentButton" type="submit" name="submit">Add comment</button></form>';
	}
?>
