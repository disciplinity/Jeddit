<?php
	session_start();
	include_once 'includes/dbh.inc.php';

	$id = htmlspecialchars($_GET["id"]);
	$like = htmlspecialchars($_GET["like"]);
	$id = mysqli_real_escape_string($conn, $id);
	$like = mysqli_real_escape_string($conn, $like);

	$username = $_SESSION['u_uid'];
	
	if (isset($_SESSION['u_id'])) {
		$sql = "SELECT likes FROM userlikes1 WHERE username='$username' AND postid='$id'";		
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		
		if (count($row) == 0) {
			$sql = "UPDATE jaro_164222_newsposts3 SET likes=likes+'$like' WHERE id='$id'";
			mysqli_query($conn, $sql);
			$sql = "INSERT INTO userlikes1 (username, likes, postid) VALUES('$username', '$like', '$id');";
			mysqli_query($conn, $sql);

		}
		
	}

	
	header("Location: index.php");
	exit();



	
	

	

