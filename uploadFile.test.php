<form action="uploadFile.test.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="exampleFormControlFile1">input</label>
		<input type="file" name="userfile[]" value="" multiple class="form-control-file">
		<input type="submit" name="submit" value="upload" />
	</div>
</form>

<?php

require_once("./config.php");

function validateUpload()
{
	if (!isset($_POST["userfile"])) return "Nothing has been uploaded.";

	return null;
}

//array_push($errorList, $errorMessage);

function validateUploadedFile($file)
{
	if ($file['error']) {
		$errorType = $file['error'];
		$errorMessage = $file['name'] . ": " . PHP_FILE_UPLOAD_ERRORS[$errorType];

		return $errorMessage;
	}

	if (!in_array($file['type'], EXTENSIONS)) {
		$errorMessage = $file['name'] . ": File type not allowed";

		return $errorMessage;
	}

	return null;
}

function pre_r($array)
{
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

function groupFileContent($file_post)
{
	$files = [];
	$file_count = count($file_post['name']);
	$file_keys = array_keys($file_post);

	for ($i = 0; $i < $file_count; $i++) {
		foreach ($file_keys as $key) {
			$files[$i][$key] = $file_post[$key][$i];
		}
	}

	return $files;
}



if (isset($_FILES['userfile'])) {

	$files = groupFileContent($_FILES['userfile']);

	$errorMessages = [];
	$successMessages = [];

	for ($i = 0; $i < count($files); $i++); {
		if ($files[$i]['error']) {
			$errorType = $files[$i]['error'];
			$errorMessage = $files[$i]['name'] . ': ' . PHP_FILE_UPLOAD_ERRORS[$errorType];
			array_push($errorsFile, $errorMessage);

			break;
		}
	}

	for ($i = 0; $i < count($files); $i++) {
		if ($files[$i]['error']) {


?>
			<?php
		} else {
			$file_ext = explode('.', $files[$i]['name']);
			$file_ext = end($file_ext);
			// echo $file_ext;

			if (!in_array($file_ext, EXTENSIONS)) {
			?>
				<div class="alert alert-danger">
					<?php echo "{$files[$i]['name']}   Invalid file extension!"; ?>
				</div> <?php
							} else {
								// pre_r($files);
								$filename = $files[$i]['tpm-name'];
								var_dump($filename);
								$destination = "../../files/$files[$i]['name']";
								// move_uploaded_file($filename, $destination);
								pre_r(move_uploaded_file($filename, ""));
								?>
				<div class=" alert alert-success">
					<?= $phpFileUploadErrors[$files[$i]['error']]; ?></div>
<?php
							}
						}
					}
				}
