<?php

function startSession()
{
	session_start();
}

function checkSession()
{
	$user = 			getSessionValue("user");
	$expiration = getSessionValue("expiration");

	if ($user) {
		if ($expiration < time()) {
			popSessionValue("user");
			setSessionValue("info", ["Session has expired."]);
		} else {
			setSessionValue("expiration", time() + LIFETIME);
		}
	}
}

function destroySession()
{
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
	$_SESSION[$key] = $value;
}

function getSessionValue(string $key)
{
	if (isset($_SESSION[$key])) {
		$value = $_SESSION[$key];

		return $value;
	}

	return null;
}

function popSessionValue(string $key)
{
	if (isset($_SESSION[$key])) {
		$value = $_SESSION[$key];
		unset($_SESSION[$key]);

		return $value;
	}

	return null;
}
