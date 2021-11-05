<?php

function destroySession()
{
	if (session_status() === PHP_SESSION_NONE) session_start();

	if (ini_get("session.use_cookies")) {
		destroySessionCookie();
	}

	session_unset();
	session_destroy();
}

function destroySessionCookie()
{
	$params = session_get_cookie_params();

	setcookie(
		session_name(),
		'',
		time() - 60 * 60 * 24 * 30,
		$params["path"],
		$params["domain"],
		$params["secure"],
		$params["httponly"],
	);
}

function setSessionValue(string $key, $value)
{
	if (session_status() === PHP_SESSION_NONE) session_start();

	$_SESSION[$key] = $value;

	session_write_close();
}

function getSessionValue(string $key)
{
	if (session_status() === PHP_SESSION_NONE) session_start();

	if (isset($_SESSION[$key])) {
		$value = $_SESSION[$key];

		session_write_close();
		return $value;
	}

	session_write_close();
	return null;
}

function popSessionValue(string $key)
{
	if (session_status() === PHP_SESSION_NONE) session_start();

	if (isset($_SESSION[$key])) {
		$value = $_SESSION[$key];
		unset($_SESSION[$key]);

		session_write_close();
		return $value;
	}

	session_write_close();
	return null;
}
