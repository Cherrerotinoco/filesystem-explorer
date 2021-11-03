<?php

require_once("./config.php");
require_once("./modules/validation.php");
require_once("./modules/session.php");
require_once("./utils/join_path.php");

if ($errorDirectoryPath = validateDirectoryPath()) 	setSessionValue("errorDirectoryPath", $errorDirectoryPath);
if ($errorFileName = validateFileName()) 						setSessionValue("errorFileName", $errorFileName);

if ($errorDirectoryPath || $errorFileName) {
	header("Location: ./createFile.test.php");
	exit();
}

try {
	$dirPath = 	join_path([BASE, $_POST["dirpath"]]);
	$fileName = join_path([$dirPath, $_POST["filename"] . ".txt"]);

	setSessionValue("dirpath", $dirPath);
	setSessionValue("fileName", $fileName);

	// Checks if file already exists
	if (file_exists($fileName)) {
		throw new Exception("File already exists.");
	}

	// Checks if parent does not exist
	if (!file_exists($dirPath)) {
		throw new Exception("Parent directory does not exist.");
	}

	// Checks if parent is not a directory
	if (!is_dir($dirPath)) {
		throw new Exception("Parent item is not a directory.");
	}

	$file = fopen($fileName, "w");
	fclose($file);

	setSessionValue("success", "File has been created.");
} catch (Throwable $e) {
	setSessionValue("errorFileSystem", $e->getMessage());
}

header("Location: ./createFile.test.php");
