<?php
	session_start();
?>	

<!DOCTYPE html>
<html>
<head>
	<title>Jeddit</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
	<div class="mainContainer">
		<div class="header">
			<?php
				if (isset($_SESSION['u_id'])) {
					echo '<form action="includes/logout.inc.php" method="POST">
							<button type="submit" name="submit">Logout</button>
							</form>';
					echo '<button type="submit" name="submit" onclick="window.location=' . "'postingpage.php';" . '">New post</button>';
				} else {
					echo '<form action="includes/signin.inc.php" method="POST">
							<input class="auth" type="text" name="uid" placeholder="Username/Email">
							<input class="auth" type="password" name="pwd" placeholder="Password">
							<button type="submit" name="submit">Sign In</button>
							</form>';
					echo '<button type="submit" name="submit" onclick="window.location=' . "'register.php';" . '">Register</button>';

				}
			?>

			<button type="submit" name="submit" onclick="window.location='index.php';">Home</button>
			<form action='hotalgorithm.php' method="POST">
				<button type="submit" name="submit">Hot</button>
			</form>


			
		</div>

