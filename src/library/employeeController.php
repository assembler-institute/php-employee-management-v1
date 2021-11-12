<?php

require_once("./employeeManager.php");

header_remove();
header('Content-Type: application/json; charset=utf-8');

try {
	$method = $_SERVER["REQUEST_METHOD"];
	$params = getQueryStringParameters();
	$data = ["warning" => "Not found"];

	switch ($method) {
		case "POST":
			if (addEmployee($params)) {
				$data = (["type" => "success", "message" => "Employee added successfully."]);
			} else {
				$data = (["type" => "danger", "message" => "Employee could not be added."]);
			}
			break;
		case "DELETE":
			if (deleteEmployee($params["id"])) {
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
			$employee = getEmployee($params["id"]);

			if ($employee) {
				$data = (["type" => "success", "message" => "Employee fetched successfully.", "employee" => $employee]);
			} else {
				$data = (["type" => "danger", "message" => "Employee could not be found."]);
			}

			break;
	}

	echo json_encode($data);
} catch (Exception $e) {
	echo json_encode(["type" => "danger", "message" => "Unexpected error"]);
}
