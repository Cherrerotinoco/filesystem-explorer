<?php

require_once("./config.php");
require_once("./modules/validation.php");
require_once("./modules/session.php");
require_once("./utils/join_path.php");

if ($errorDirectoryPath = validateDirectoryPath()) 	setSessionValue("errorDirectoryPath", $errorDirectoryPath);
if ($errorFileName = validateFileName()) 						setSessionValue("errorFileName", $errorFileName);

if ($errorDirectoryPath || $errorFileName) {
	header("Location: ./createFile.form.php");
	exit();
}

try {
	$destpath = join_path([BASE, $_POST["destpath"]]);
	$fullpath = join_path([$destpath, $_POST["filename"] . ".txt"]);

	// setSessionValue("destpath", $destpath);
	// setSessionValue("fullpath", $fullpath);

	// Checks if file already exists
	if (file_exists($fullpath)) {
		throw new Exception("File already exists.");
	}

	// Checks if parent does not exist
	if (!file_exists($destpath)) {
		throw new Exception("Parent directory does not exist.");
	}

	// Checks if parent is not a directory
	if (!is_dir($destpath)) {
		throw new Exception("Parent item is not a directory.");
	}

	$file = fopen($fullpath, "w");
	fclose($file);

	setSessionValue("success", "File has been created.");
} catch (Throwable $e) {
	setSessionValue("errorFileSystem", $e->getMessage());
}

header("Location: ./createFile.form.php");
