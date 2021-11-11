<?php
require_once("./src/library/sessionHelper.php");

startSession();

if (getSessionValue("user")) {
	include("./src/dashboard.php");
} else {
	include("./src/login.php");
}
