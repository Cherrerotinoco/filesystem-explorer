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
	<form action="./createFile.action.php" method="POST">
		<input class="form-control" type="text" name="filename" id="input_filename" required placeholder="File name..." />
		<input class="form-control" type="text" name="dirpath" id="input_dirpath" value="<?= $currentDirectory ?>" />
		<button type="submit">Create File</button>
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