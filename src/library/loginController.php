<?php

require_once("./loginManager.php");
require_once("./sessionHelper.php");

$query = $_SERVER["QUERY_STRING"];

switch ($query) {
	case "login":
		login();
		break;
	case "logout":
		logout();
		break;
}

header("Location: ../../index.php");
