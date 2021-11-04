<?php

require_once("./modules/session.php");

if (!$currentDirectory = getSessionValue("currentDirectory")) $currentDirectory = "/";

$errorUploadedFileList = 		popSessionValue("errorUploadedFileList");
$successUploadedFileList = 	popSessionValue("successUploadedFileList");
$errorFileSystem =					popSessionValue("errorFileSystem");
$errorDirectoryPath =				popSessionValue("errorDirectoryPath");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
	<link href="./assets/styles/css/main.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Document</title>
</head>

<body>
	<?php
	if ($errorUploadedFileList) :
		foreach ($errorUploadedFileList as $error) : ?>
			<div class="danger alert-danger">
				<?= $error ?>
			</div>
	<?php
		endforeach;
	endif;
	?>

	<?php
	if ($successUploadedFileList) :
		foreach ($successUploadedFileList as $success) : ?>
			<div class="alert alert-success">
				<?= $success ?>
			</div>
	<?php
		endforeach;
	endif;
	?>

	<?php if ($errorFileSystem) : ?>
		<div class="alert alert-danger">
			<?= $errorFileSystem ?>
		</div>
	<?php endif; ?>

	<?php if ($errorDirectoryPath) : ?>
		<div class="alert alert-danger">
			<?= $errorDirectoryPath ?>
		</div>
	<?php endif; ?>

	<form action="./uploadFile.action.php" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<input class="form-control" type="file" name="files[]" value="" multiple class="form-control-file">
			<input class="form-control" type="text" name="destpath" id="input_destpath" value="<?= $currentDirectory ?>" />
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