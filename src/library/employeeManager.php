<?php
require_once("./sessionHelper.php");

function addEmployee(array $newEmployee): bool
{
	try {
		$json_url = "../../resources/employees.json";
		$employeesCollection = json_decode(file_get_contents($json_url), true);

		$newEmployee["id"] = getNextIdentifier($employeesCollection);
		array_push($employeesCollection, $newEmployee);

		file_put_contents($json_url, json_encode(array_values($employeesCollection), JSON_PRETTY_PRINT));
		return true;
	} catch (Throwable $e) {
		return false;
	}
}

//return ["success", "Employee saved successfully."];
//return ["danger", "Employee could not be saved."];

function deleteEmployee(int $id)
{
	try {
		$employeesCollection = json_decode(file_get_contents("../../resources/employees.json"), true);
		foreach ($employeesCollection as $index => $employee) {
			echo $index;
			if ($employee["id"] === $id) {
				unset($employeesCollection[$index]);
				file_put_contents("../../resources/employees.json", json_encode(array_values($employeesCollection), JSON_PRETTY_PRINT));
				return true;
			}
		}

		return false;
	} catch (Throwable $e) {
		return false;
	}
}

//return ["success", "Employee deleted successfully."];
//return ["danger", "Employee could not be deleted."];

function updateEmployee(array $updateEmployee): bool
{
	try {
		$employeesCollection = json_decode(file_get_contents("../../resources/employees.json"), true);

		if (!deleteEmployee($updateEmployee["id"])) return false;

		array_push($employeesCollection, $updateEmployee);

		file_put_contents("../../resources/employees.json", json_encode(array_values($employeesCollection), JSON_PRETTY_PRINT));
		return true;
	} catch (Throwable $e) {
		return false;
	}
}

//return ["success", "Employee saved successfully."];
//return ["danger", "Employee could not be saved."];

function getEmployee(int $id)
{
	try {
		$employeesCollection = json_decode(file_get_contents("../../resources/employees.json"), true);

		foreach ($employeesCollection as $employee) {
			if ($employee["id"] === $id) {
				return ($employee);
			}
		}
	} catch (Throwable $e) {
		return null;
	}
}

function getQueryStringParameters()
{
	var_dump(file_get_contents('php://input'));
	$params = json_decode(file_get_contents('php://input'), true);

	return $params;
}

function getNextIdentifier(array $employeesCollection): int
{
	return intval(end($employeesCollection)["id"]) + 1;
}

function removeAvatar($id)
{
	// TODO implement it
}
