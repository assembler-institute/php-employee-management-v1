<?php

require_once("../../config/constants.php");
require_once(LIBRARY . "/loginManager.php");
require_once(LIBRARY . "/sessionHelper.php");

startSession();

$query = $_SERVER["QUERY_STRING"];

switch ($query) {
	case "login":
		login();
		break;
	case "logout":
		logout();
		break;
}

header("Location: " . BASE_URL);
