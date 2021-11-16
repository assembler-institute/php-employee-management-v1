<?php

require_once("../../config/constants.php");
require_once(LIBRARY . "/sessionHelper.php");
require_once(LIBRARY . "/employeeManager.php");

startSession();
checkSession();

if (!getSessionValue("user")) {
	echo json_encode(["type" => "warning", "message" => "Session has expired. Login again required."]);
	exit();
}

try {
	$method = $_SERVER["REQUEST_METHOD"];
	$params = getQueryStringParameters();

	switch ($method) {
		case "POST":
			$params["id"] = getNextIdentifier();

			if (addEmployee($params)) {
				$data = (["type" => "success", "message" => "Employee added successfully.", "id" => $params["id"]]);
			} else {
				$data = (["type" => "danger", "message" => "Employee could not be added."]);
			}

			break;
		case "DELETE":
			$id = intval($params["id"]);

			if (deleteEmployee($id)) {
				$data = (["type" => "success", "message" => "Employee deleted successfully."]);
			} else {
				$data = (["type" => "danger", "message" => "Employee could not be deleted."]);
			}

			break;
		case "PUT":
			if (updateEmployee($params)) {
				$data = (["type" => "success", "message" => "Employee updated successfully."]);
			} else {
				$data = (["type" => "danger", "message" => "Employee could not be updated."]);
			}

			break;
		case "GET":
			$id = intval($params["id"]);
			$employee = getEmployee($id);

			if ($employee) {
				$data = (["type" => "success", "message" => "Employee fetched successfully.", "employee" => $employee]);
			} else {
				$data = (["type" => "danger", "message" => "Employee could not be found."]);
			}

			break;
		default:
			$data = ["warning" => "Not found"];
	}

	echo json_encode($data);
} catch (Exception $e) {
	echo json_encode(["type" => "danger", "message" => "Unexpected error"]);
}
