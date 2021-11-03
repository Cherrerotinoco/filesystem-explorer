<?php

require_once("./modules/session.php");

if (!$currentDirectory = getSessionValue("currentDirectory")) $currentDirectory = "./";

function renderExplorerContent()
{
	// Get current directory path from session
	// Get files and subfolders based on current path
	// For each file or folder, render a card
}

$foo = scandir($currentDirectory);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<pre><?php print_r($foo) ?><br><?php print_r(php_uname('s')) ?></pre>
</body>

</html>