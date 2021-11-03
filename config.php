<?php

define("BASE", realpath("./drive"));
define("EXTENSIONS", [
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
]);

define("FILE_TYPES", [
	'application/msword',
	'application/vnd.ms-powerpoint',
	'image/svg+xml',
	'image/jpg',
	'image/png',
	'text/csv',
	'text/plain',
	'application/vnd.oasis.opendocument.text',
	'application/pdf',
	'application/zip',
	'application/vnd.rar',
	'application/x-msdownload',
	'audio/mpeg',
	'video/mp4',
]);

define("PHP_FILE_UPLOAD_ERRORS", [
	0 => 'File uploaded successful',
	1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
	2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
	3 => 'The uploaded file was only partially uploaded',
	4 => 'No file was uploaded',
	6 => 'Missing a temporary folder',
	7 => 'Failed to write file to disk.',
	8 => 'A PHP extension stopped the file upload.',
]);
