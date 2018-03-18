<?php
	session_start();
	include_once 'dbh.inc.php';
	$id = htmlspecialchars($_GET["id"]);
	$id = mysqli_real_escape_string($conn, $id);

	
	
	if (isset($_POST['submit'])) {
		$commentTextArea = mysqli_real_escape_string($conn, $_POST['commentTextArea']);
		$commentTextArea = htmlspecialchars($commentTextArea);
		
		if (empty($commentTextArea)) {
			header("Location: ../openPostPage.php?id=" . $id .  "&textarea=empty");
			exit();
		}
		
		$username = $_SESSION['u_uid'];
		$time = date('Y/m/d H:i:s');
		
		$sql = "INSERT INTO jaro_164222_commentsforposts3 (username, postid, comment, time) VALUES ('$username', '$id', '$commentTextArea', '$time');";
		mysqli_query($conn, $sql);
		
		header("Location: ../openPostPage.php?id=" . $id);
		exit();
		
	} else {
		header("Location: ../index.php");
		exit();
	}
