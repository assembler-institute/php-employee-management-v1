<?php

function checkCredentials(string $user, string $password): bool
{
	return false;
}

require_once("./db/users.php");

function validateCredentials(): bool
{
	if (!filter_has_var(INPUT_POST, "user")) return false;
	if (!filter_has_var(INPUT_POST, "password")) return false;

	return true;
}

function checkLogin(): bool
{
	if (!userValidation() || !passwordValidation()) return false;

	$user = $_POST["user"];
	$password = $_POST["password"];

	return (checkUserMatch($user, $password));
}

function checkLogout(): bool
{
	session_start();

	return boolval($_SESSION["user"]);
}
