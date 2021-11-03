<?php

require_once("./config.php");
require_once("./modules/validation.php");
require_once("./modules/session.php");
require_once("./utils/join_path.php");

if ($errorDirectoryPath = validateDirectoryPath()) setSessionValue("errorDirectoryPath", $errorDirectoryPath);
if ($errorDirectoryName = validateDirectoryName()) setSessionValue("errorDirectoryName", $errorDirectoryName);

if ($errorDirectoryPath || $errorDirectoryName) {
	header("Location: ./createDirectory.test.php");
	exit();
}

try {
	$dirPath = 	join_path([BASE, $_POST["dirpath"]]);
	$dirName = 	join_path([$dirPath, $_POST["dirname"]]);

	setSessionValue("dirpath", $dirPath);
	setSessionValue("dirname", $dirName);

	// Checks if directory already exists
	if (file_exists($dirName)) {
		throw new Exception("Directory already exists.");
	}

	// Checks if parent does not exist
	if (!file_exists($dirPath)) {
		throw new Exception("Parent directory does not exist.");
	}

	// Checks if parent is not a directory
	if (!is_dir($dirPath)) {
		throw new Exception("Parent item is not a directory.");
	}

	mkdir($dirName);

	setSessionValue("success", "Directory has been created.");
} catch (Throwable $e) {
	setSessionValue("errorFileSystem", $e->getMessage());
}

header("Location: ./createDirectory.test.php");
