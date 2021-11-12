<?php

require_once("./employeeManager.php");

$method = $_SERVER["REQUEST_METHOD"];

try {
	$params = getQueryStringParameters();

	switch ($method) {
		case "POST":
			addEmployee($params);
			break;
		case "DELETE":
			deleteEmployee($params["id"]);
			break;
		case "PUT":
			updateEmployee($params);
			break;
		case "GET":
			getEmployee($params["id"]);
			break;
	}
} catch (Exception $e) {
	echo "1";
}
