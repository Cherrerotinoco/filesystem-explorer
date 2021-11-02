<?php

require_once("./config.php");
require_once("./modules/validation.php");
require_once("./modules/session.php");
require_once("./utils/join_path.php");

if ($errorDirectoryPath = validateDirectoryPath()) 	setSessionValue("errorDirectoryPath", $errorDirectoryPath);
if ($errorFileName = validateFileName()) 						setSessionValue("errorFileName", $errorFileName);

if ($errorDirectoryPath || $errorFileName) {
	header("Location: ./createDirectory.test.php");
	exit();
}

try {
	$dirPath = 	join_path([BASE, $_POST["dirpath"]]);
	$fileName = join_path([$dirPath, $_POST["fileName"] . ".txt"]);

	setSessionValue("dirpath", $dirPath);
	setSessionValue("fileName", $fileName);

	// Checks if directory already exists
	if (file_exists($fileName)) {
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

	mkdir($fileName);

	setSessionValue("success", "Directory has been created");
} catch (Throwable $e) {
	setSessionValue("errorFileSystem", $e->getMessage());
}

header("Location: ./createDirectory.test.php");
