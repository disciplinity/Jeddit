<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';
	
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);

	//Error handlers
	//Check for empty fields
	if (empty($uid) || empty($pwd) || empty($email)) {
		header("Location: ../register.php?signup=empty");
		exit();		
	} else {
			// Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../register.php?signup=email");
				exit();				
			} else {
				$sql = "SELECT * FROM jaro_164222_users WHERE user_uid='$uid';";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				// User already exists
				if ($resultCheck > 0) {
					header("Location: ../register.php?signup=usertaken");
					exit();	
				} else {
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO jaro_164222_users (user_email, user_uid, user_pwd)
						VALUES ('$email', '$uid', '$hashedPwd');";
						
					mysqli_query($conn, $sql);
					header("Location: ../register.php?signup=success");
					exit();	
				}
			}
		}
} else {
	header("Location: ../register.php");
	exit();
}