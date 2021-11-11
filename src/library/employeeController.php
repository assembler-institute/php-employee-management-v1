<?php

require_once("./employeeManager.php");

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
	case 'POST':
		var_dump(addEmployee([]));
		break;
	case 'DELETE':
		var_dump(deleteEmployee(0));
		break;
	case "PUT":
		var_dump(updateEmployee([]));
	case "GET":
		getEmployee(0);
}
