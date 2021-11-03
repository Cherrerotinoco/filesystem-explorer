<?php

require_once("./modules/session.php");

if (!$currentDirectory = getSessionValue("currentDirectory")) $currentDirectory = "/";

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<form action="./uploadFile.action.php" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<input class="form-control" type="file" name="files[]" value="" multiple class="form-control-file">
			<input class="form-control" type="text" name="dirpath" id="input_dirpath" value="<?= $currentDirectory ?>" />
			<input type="submit" name="submit" value="upload" />
		</div>
	</form>

	<pre>
		<?php
		session_start();
		print_r($_SESSION);
		destroySession();
		?>
	</pre>
</body>

</html>