<?php
	include_once 'header.php';
?>

<div class="registerForm">
	<form action="includes/register.inc.php" method="POST">
		<span style="color: red">*</span>Username: <br><input type="text" name="uid" autocomplete="off"><br>
		<span style="color: red">*</span>Password: <br><input type="password" name="pwd" autocomplete="off"><br>
		<span style="color: red">*</span>Email: <br><input type="text" name="email" autocomplete="off"><br><br>

		<button type="submit" name="submit">Submit</button>
	</form>
</div>
</div>

</body>


</html>