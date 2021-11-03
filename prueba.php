<?php

if (isset($_POST['submit'])) {
    $file_array = $_FILES['userfile'];
    // print_r($_FILES['userfile']);

    $fileName = $_FILES['userfile']['name'];
    $fileType = $_FILES['userfile']['type'];
    $fileTpmName = $_FILES['userfile']['tmp_name'];
    $fileError = $_FILES['userfile']['error'];
    $fileSize = $_FILES['userfile']['size'];


    $file_ext = explode('.', $fileName);
    $file_ext = strtolower(end($file_ext));
    $extensions = array(
        'doc',
        'csv',
        'jpg',
        'png',
        'txt',
        'ppt',
        'odt',
        'pdf',
        'zip',
        'rar',
        'exe',
        'svg',
        'mp3',
        'mp4',
    );
    if (!in_array($file_ext, $extensions)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $extensions;
                $fileDestination = 'files/' . $fileNameNew;
                move_uploaded_file($fileTpmName, $fileDestination);
                header("index.php?uploadsuccess");
            } else {
                echo "you file its too big";
            }
        } else {
            echo "there was a error uploading your file!";
        }
    } else {
        echo "you can upload files of this type!";
    }
}
