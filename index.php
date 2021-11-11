<?php
require_once("./src/library/sessionHelper.php");

startSession();

if (getSessionValue("user")) {
	$query = $_SERVER["QUERY_STRING"];

	switch ($query) {
		case "employee":
			include("./src/employee.php");
			break;
		case "dashboard":
			include("./src/dashboard.php");
			break;
		default:
			header("Location: ./index.php?dashboard");
	}
} else {
	include("./src/login.php");
}
