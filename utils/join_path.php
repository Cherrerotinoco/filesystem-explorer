<?php

function join_path(array $path)
{
	return preg_replace("/\/{2,}/", "/", join("/", $path));
}
