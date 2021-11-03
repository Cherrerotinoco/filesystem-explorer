<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleFormControlFile1">input</label>
        <input type="file" name="userfile[]" value="" multiple="" class="form-control-file">
        <input type="submit" name="submit" value="upload" />
    </div>
</form>
<?php
$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);

if (isset($_FILES['userfile'])) {
    $file_array = reArrayFIles($_FILES['userfile']);
    for ($i = 0; $i < count($file_array); $i++) {
        if ($file_array[$i]['error']) { ?>
            <div class="alert alert-danger">
                <?= $file_array[$i]['name'] . '' . $phpFileUploadErrors[$file_array[$i]['error']];
                ?></div><?php
                    } else {
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
                        $file_ext = explode('.', $file_array[$i]['name']);
                        $file_ext = end($file_ext);
                        // echo $file_ext;

                        if (!in_array($file_ext, $extensions)) {
                        ?><div class="alert alert-danger">
                    <?php echo "{$file_array[$i]['name']}   Invalid file extension!";
                    ?>
                </div> <?php
                        } else {
                            // pre_r($file_array);
                            $filename = $file_array[$i]['tpm-name'];
                            var_dump($filename);
                            $destination = "../../files/$file_array[$i]['name']";
                            // move_uploaded_file($filename, $destination);
                            pre_r(move_uploaded_file($filename,""));
                        ?>
                <div class=" alert alert-success">
                    <?= $phpFileUploadErrors[$file_array[$i]['error']]; ?></div>
<?php
                        }
                    }
                }
            }

            function reArrayFIles($file_post)
            {
                $file_ary = array();
                $file_count = count($file_post['name']);
                $file_keys = array_keys($file_post);

                for ($i = 0; $i < $file_count; $i++) {
                    foreach ($file_keys as $key) {
                        $file_ary[$i][$key] = $file_post[$key][$i];
                    }
                }

                return $file_ary;
            }

            function pre_r($array)
            {
                echo '<pre>';
                var_dump($array);
                echo '</pre>';
            }
