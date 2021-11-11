<?php
require_once("./src/library/sessionHelper.php");
startSession();

if (getSessionValue("user")) {
	$query = $_SERVER["QUERY_STRING"];

	switch ($query) {
		case "employee":
			header("Location: ./src/employee.php");
			exit();
		case "dashboard":
			header("Location: ./src/dashboard.php");
			exit();
		default:
			header("Location: ./src/dashboard.php");
			exit();
	}
} else {
	header("Location: ./src/login.php");
	exit();
}
