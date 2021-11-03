<?php

require_once("./config.php");
require_once("./modules/validation.php");
require_once("./modules/session.php");
require_once("./utils/join_path.php");
require_once("./utils/groupUploadedFilesContent.php");

if ($errorDirectoryPath = validateDirectoryPath()) {
	setSessionValue("errorDirectoryPath", $errorDirectoryPath);
	header("Location: ./uploadFile.test.php");
	exit();
}

$destpath = join_path([BASE, $_POST["dirpath"]]);
setSessionValue("dirpath", $destpath);

try {
	// Checks if parent does not exist
	if (!file_exists($destpath)) {
		throw new Exception("Parent directory does not exist.");
	}

	// Checks if parent is not a directory
	if (!is_dir($destpath)) {
		throw new Exception("Parent item is not a directory.");
	}
} catch (Throwable $e) {
	setSessionValue("errorFileSystem", $e->getMessage());
	header("Location: ./uploadFile.test.php");
	exit();
}

$files = groupUploadedFilesContent($_FILES['files']);

$errorUploadedFileList = [];
$successUploadedFileList = [];

for ($i = 0; $i < count($files); $i++) {
	echo 1;

	if ($errorMessage = validateUploadedFile($files[$i])) {
		array_push($errorUploadedFileList, $errorMessage);
	} else {
		$tmpname 	= $files[$i]['tmp_name'];
		$filename = $files[$i]["name"];
		$fullname = join_path([$destpath, $filename]);

		move_uploaded_file($tmpname, $fullname);

		$successMessage = "File " . $files[$i]["name"] . " has been uploaded succesfully.";
		array_push($successUploadedFileList, $successMessage);
	}
}

setSessionValue("errorUploadedFileList", $errorUploadedFileList);
setSessionValue("successUploadedFileList", $successUploadedFileList);
setSessionValue("stuff", $files);

header("Location: ./uploadFile.test.php");
