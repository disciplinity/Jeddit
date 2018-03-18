<?php

session_start();


if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';
	
	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileExt = explode('.', $fileName);
	$fileActualExtension = strtolower(end($fileExt)); 
	
	$allowed = array('jpg', 'png', 'jpeg', 'gif');
	$fileNameNew = uniqid('', true).".".$fileActualExtension;
	$fileDestination = '../uploads/'.$fileNameNew;
	if (in_array($fileActualExtension, $allowed)) {
		move_uploaded_file($fileTmpName, $fileDestination);
	}
	
	// if (in_array($fileActualExtension, $allowed)) {
		// if ($fileError === 0) {
			// if ($fileSize < 50000) {
				// $fileNameNew = uniqid('', true).".".$fileActualExtension;
				// $fileDestination = '../uploads/'.$fileNameNew;
				// move_uploaded_file($fileTmpName, $fileDestination);
			// } else {
				// echo 'Your file is too big!';
			// }
		// } else {
			// echo "There was an error uploading your file!";
		// }
	// } else {
		// echo "You cannot upload files of this type!";
	// }
	
	$username = $_SESSION['u_uid'];
	$title = mysqli_real_escape_string($conn, $_POST['postTitle']);
	$text = mysqli_real_escape_string($conn, $_POST['postText']);
	$title = htmlspecialchars($title);
	$text = htmlspecialchars($text);
	
	$time = date('Y/m/d H:i:s');

	if (empty($title) || empty($text)) {
		header("Location: ../postingpage.php?post=empty");
		exit();
	}
	
	if (is_null($file)) {
		$sql = "INSERT INTO jaro_164222_newsposts3 (username, time, title, text) VALUES('$username', '$time', '$title', '$text');";
	} else {
		$sql = "INSERT INTO jaro_164222_newsposts3 (username, time, title, text, filename) VALUES('$username', '$time', '$title', '$text', '$fileNameNew');";
	}
	mysqli_query($conn, $sql);
	
	header("Location: ../index.php");
	exit();
	
} else {
	header("Location: ../index.php");
	exit();
} 