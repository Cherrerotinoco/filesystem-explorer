<?php

require_once("./config.php");
require_once("./modules/validation.php");
require_once("./modules/session.php");
require_once("./utils/join_path.php");

if ($errorDirectoryPath = validateDirectoryPath()) setSessionValue("errorDirectoryPath", $errorDirectoryPath);
if ($errorDirectoryName = validateDirectoryName()) setSessionValue("errorDirectoryName", $errorDirectoryName);

if ($errorDirectoryPath || $errorDirectoryName) {
	header("Location: ./createDirectory.form.php");
	exit();
}

try {
	$destpath = 	join_path([BASE, $_POST["dirpath"]]);
	$fullpath = 	join_path([$destpath, $_POST["dirname"]]);

	// setSessionValue("dirpath", $destpath);
	// setSessionValue("dirname", $fullpath);

	// Checks if directory already exists
	if (file_exists($fullpath)) {
		throw new Exception("Directory already exists.");
	}

	// Checks if parent does not exist
	if (!file_exists($destpath)) {
		throw new Exception("Parent directory does not exist.");
	}

	// Checks if parent is not a directory
	if (!is_dir($destpath)) {
		throw new Exception("Parent item is not a directory.");
	}

	mkdir($fullpath);

	setSessionValue("success", "Directory has been created.");
} catch (Throwable $e) {
	setSessionValue("errorFileSystem", $e->getMessage());
}

header("Location: ./createDirectory.form.php");
