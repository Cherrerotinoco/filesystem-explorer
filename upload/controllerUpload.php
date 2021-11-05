<?php

session_start();

require_once("../config.php");
require_once("../modules/validation.php");
require_once("../modules/session.php");
require_once("../utils/join_path.php");
require_once("../utils/groupUploadedFilesContent.php");

//include ("../models/MotherCell/Files/ImageFile.php");
require_once("../models/MotherCell/Files.php");
require_once("../controllers/dataBaseController.php");

$errorList = [];
$successList = [];

if ($errorDirectoryPath = validateDirectoryPath()) array_push($errorList,  $errorDirectoryPath);

if (!$errorDirectoryPath) {

    try {
        $destpath = join_path([ROOT_DIRECTORY, $_POST["destpath"]]);

        // Checks if parent does not exist
        if (!file_exists($destpath)) {
            throw new Exception("Parent directory does not exist.");
        }

        // Checks if parent is not a directory
        if (!is_dir($destpath)) {
            throw new Exception("Parent item is not a directory.");
        }

        $files = groupUploadedFilesContent($_FILES['files']);

        $errorList = [];
        $successList = [];

        for ($i = 0; $i < count($files); $i++) {
            echo 1;

            if ($errorMessage = validateUploadedFile($files[$i])) {
                array_push($errorList, $errorMessage);
            } else {
                $tmpname = $files[$i]['tmp_name'];
                $filename = filter_var($files[$i]["name"], FILTER_SANITIZE_URL);
                $fullname = join_path([$destpath, $filename]);
                $extension = explode(".", $filename)[1];
                $filename = explode(".", $filename)[0];
                $size = $files[$i]['size'];
                $altString = $tmpname;
                // in this case this is a img
                $db = new Db();
                $id = $db->generateUniqueId();
                $file = new Files($id, $filename, $destpath, $size);
                //$file = new ImageFile($id, $filename, $destpath, $size, $altString);
                move_uploaded_file($tmpname, $fullname);
                $db->createNewEntry((array)$file);
                $successMessage = "File " . $files[$i]["name"] . " has been uploaded succesfully.";
                array_push($successList, $successMessage);
            }
        }
    } catch (Throwable $e) {
        array_push($errorList, $e->getMessage());
    }
}

setSessionValue("errorList", $errorList);
setSessionValue("successList", $successList);
var_dump($_SESSION);
//header("Location: ../index.php");
