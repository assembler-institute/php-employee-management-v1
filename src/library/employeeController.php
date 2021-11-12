<?php

require_once("./employeeManager.php");

$method = $_SERVER["REQUEST_METHOD"];

try {
	$params = getQueryStringParameters();

	switch ($method) {
		case "POST":
			if (addEmployee($params)) {
				echo json_encode(["data" => ["success", "Employee saved successfully."]]);
			} else {
				echo json_encode(["danger", "Employee could not be saved."]);
			}
			break;
		case "DELETE":
			if (deleteEmployee($params["id"])) {
				echo json_encode(["success", "Employee deleted successfully."]);
			} else {
				echo json_encode(["danger", "Employee could not be deleted."]);
			}
			break;
		case "PUT":
			if (updateEmployee($params)) {
				echo json_encode(["success", "Employee saved successfully."]);
			} else {
				echo json_encode(["danger", "Employee could not be saved."]);
			}
			break;
		case "GET":
			getEmployee($params["id"]);
			break;
	}
} catch (Exception $e) {
	echo "1";
}
