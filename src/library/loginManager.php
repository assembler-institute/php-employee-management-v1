<?php

require_once(LIBRARY . "/sessionHelper.php");

function login()
{
	if (!validateLoginParams()) return setSessionValue("danger", ["Username and password cannot be blank."]);

	$username = $_POST["username"];
	$password = $_POST["password"];
	$userId = getUserId($username, $password);

	if ($userId === -1) return setSessionValue("danger", ["Invalid credentials."]);

	setSessionValue("user", ["userId" => $userId, "username" => $username]);
	setSessionValue("success", ["Logged in successfully."]);
	setSessionValue("expiration", time() + LIFETIME);
}

function logout()
{
	if (getSessionValue("user")) {
		popSessionValue("user");
		setSessionValue("success", ["Logged out successfully."]);
	} else {
		setSessionValue("info", ["User has not already logged in."]);
	}
}

function validateLoginParams(): bool
{
	if (!isset($_POST["username"]) || !$_POST["username"]) return false;
	if (!isset($_POST["password"]) || !$_POST["password"]) return false;

	return true;
}

function getUserId(string $username, string $password): int
{
	try {
		$users = json_decode(file_get_contents(RESOURCES . "/users.json"), true)["users"];

		foreach ($users as $user) {
			if ($username === $user["name"] && password_verify($password, $user["password"])) return $user["userId"];
		}

		return -1;
	} catch (Throwable $e) {
		return -1;
	}
}
