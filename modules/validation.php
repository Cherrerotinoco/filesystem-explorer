<?php

function validateDirectoryPath()
{
	if (!isset($_POST["dirpath"])) 																		return "Directory path not specified.";
	if (!preg_match("/^\/([^\/:*?\"<>|]+\/?)*$/", $_POST["dirpath"])) return "Directory path is invalid.";
	if (preg_match("/\/../", $_POST["dirpath"])) 											return "Directory path does not allow reverse traversal.";

	return null;
}

function validateDirectoryName()
{
	if (!isset($_POST["dirname"])) 																return "Directory name not specified.";
	if (!preg_match("/^[^\/\\:*?\"<>|]+$/", $_POST["dirname"])) 	return "Directory name is invalid.";

	return null;
}

function validateFileName()
{
	if (!isset($_POST["filename"])) 															return "File name not specified.";
	if (!preg_match("/^[^\/\\:*?\"<>|]+$/", $_POST["filename"])) 	return "File name is invalid.";

	return null;
}
