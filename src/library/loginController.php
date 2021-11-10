<?php

require_once("./loginManager.php");
require_once("./sessionHelper.php");

if (isset($_GET["login"])) {
	// compruebo que user y password existen y son correctos

	if (validateCredentials() && checkCredentials("", "")) {
		//handle 
		setSessionValue("errorMsg", "User has logged successfully.");
	} else {
		setSessionValue("errorMsg", "Access denied. Credentials are invalid.");
	}
}

if (isset($_GET["logout"])) {
	if (getSessionValue("userid")) {
		destroySession();
		setSessionValue("notification", "User has logged out.");
	} else {
		setSessionValue("notification", "User is not already logged.");
	}
}

header("../../index.php");

// 