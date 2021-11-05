<?php

# Let me kick your ass!
if (count($_POST) === 0)  exit();


require_once('fileClass.php');
require_once('../controllers/dataBaseController.php');

# Get new folder name and sanitize for URLs
$newFolder = filter_var($_POST["newFolder"], FILTER_SANITIZE_URL);

# Get current user path for the folder destination
$currentUserPath = $_POST["currentUserPath"];
$destination = $currentUserPath;

# Init the classes
$folder = new Folder($newFolder);
$folder->create($destination);

$db = new Db();
$db->createNewEntry((array)$folder);

# echo 'Done!';