<?php
	include_once 'header.php';
?>

<div class="postingBlock">

	<form action="includes/postnews.inc.php" method="POST" enctype="multipart/form-data">
		<label>Title</label>
		<input type="text" name="postTitle"><br>
		<textarea id="postTextField" name="postText" placeholder="Enter the text of your post here..."></textarea><br>
		<input type="file" name="file"><br>
		<button type="submit" name="submit">Submit</button>
	</form>
</div>

</div>
</body>

</html>