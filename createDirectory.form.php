<?php

require_once("./modules/session.php");

if (!$currentDirectory = getSessionValue("currentDirectory")) $currentDirectory = "/";

$errorDirectoryPath = popSessionValue("errorDirectoryPath");
$errorDirectoryName =	popSessionValue("errorDirectoryName");
$errorFileSystem =		popSessionValue("errorFileSystem");
$success =						popSessionValue("success");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
	<link href="./assets/styles/css/main.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>


	<div class="d-flex flex-column justify-content-center align-items-center vh-100 vw-100">
		<?php if ($success) : ?>
			<div class="alert alert-info">
				<?= $success ?>
			</div>
		<?php endif; ?>

		<?php if ($errorDirectoryPath) : ?>
			<div class="alert alert-danger">
				<?= $errorDirectoryPath ?>
			</div>
		<?php endif; ?>

		<?php if ($errorDirectoryName) : ?>
			<div class="alert alert-danger">
				<?= $errorDirectoryName ?>
			</div>
		<?php endif; ?>

		<?php if ($errorFileSystem) : ?>
			<div class="alert alert-danger">
				<?= $errorFileSystem ?>
			</div>
		<?php endif; ?>

		<form class="p-2 m-2 d-flex flex-column align-items-center" style="width: 20rem" action="./createDirectory.action.php" method="POST">
			<label class="form-label w-100" for="input_dirname">Directory name</label>
			<input class="form-control mb-3" type="text" name="dirname" id="input_dirname" required placeholder="Directory name..." />
			<label class="form-label w-100" for="input_dirpath">Destination folder</label>
			<input class="form-control mb-3" type="text" name="dirpath" id="input_dirpath" required placeholder="/" value="<?= $currentDirectory ?>" />
			<button class="btn btn-primary" type="submit">Create Directory</button>
		</form>
	</div>
</body>

</html>