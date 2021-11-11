<?php

function addEmployee(array $newEmployee)
{
	startSession();

	try {
		$employeesCollection = json_decode(file_get_contents("./resources/employees.json"));

		$newEmployee["id"] = getNextIdentifier($employeesCollection);
		array_push($employeesCollection, $newEmployee);

		file_put_contents("./resources/employees.json", json_encode($employeesCollection, JSON_PRETTY_PRINT));
		setSessionValue("success", "Employee saved successfully.");
	} catch (Throwable $e) {
		setSessionValue("danger", "Employee could not be saved.");
	}
}

function deleteEmployee(string $id)
{
	startSession();

	try {
		$employeesCollection = json_decode(file_get_contents("./resources/employees.json"));

		foreach ($employeesCollection as $employee) {
			if ($employee["id"] === $id) {
				unset($employee);
				break;
			}
		}

		file_put_contents("./resources/employees.json", json_encode($employeesCollection, JSON_PRETTY_PRINT));
		setSessionValue("success", "Employee deleted successfully.");
	} catch (Throwable $e) {
		setSessionValue("danger", "Employee could not be deleted.");
	}
}

function updateEmployee(array $updateEmployee)
{
	startSession();

	try {
		$employeesCollection = json_decode(file_get_contents("./resources/employees.json"));

		deleteEmployee($updateEmployee["id"]);
		array_push($employeesCollection, $updateEmployee);

		file_put_contents("./resources/employees.json", json_encode($employeesCollection, JSON_PRETTY_PRINT));
		setSessionValue("success", "Employee saved successfully.");
	} catch (Throwable $e) {
		setSessionValue("danger", "Employee could not be saved.");
	}
}

function getEmployee(string $id)
{
	try {
		$employeesCollection = json_decode(file_get_contents("./resources/employees.json"));

		foreach ($employeesCollection as $employee) {
			if ($employee["id"] === $id) {
				return ($employee);
			}
		}
	} catch (Throwable $e) {
		return null;
	}
}


function removeAvatar($id)
{
	// TODO implement it
}


function getQueryStringParameters(): array
{
	// TODO implement it
	$employee = [
		"name" => 					isset($_POST["name"]) ? 					getSanitizedValue($_POST["name"]) : null,
		"lastName" => 			isset($_POST["lastName"]) ? 			getSanitizedValue($_POST["lastName"]) : null,
		"age" => 						isset($_POST["age"]) ? 						getSanitizedValue($_POST["age"]) : null,
		"gender" => 				isset($_POST["gender"]) ? 				getSanitizedValue($_POST["gender"]) : null,
		"email" => 					isset($_POST["email"]) ? 					getSanitizedValue($_POST["email"]) : null,
		"phoneNumber" => 		isset($_POST["phoneNumber"]) ? 		getSanitizedValue($_POST["phoneNumber"]) : null,
		"streetAddress" =>	isset($_POST["streetAddress"]) ?	getSanitizedValue($_POST["streetAddress"]) : null,
		"city" => 					isset($_POST["city"]) ? 					getSanitizedValue($_POST["city"]) : null,
		"postalCode" => 		isset($_POST["postalCode"]) ? 		getSanitizedValue($_POST["postalCode"]) : null,
		"state" => 					isset($_POST["state"]) ? 					getSanitizedValue($_POST["state"]) : null,
	];

	return $employee;
}

function getNextIdentifier(array $employeesCollection): int
{
	return intval(end($employeesCollection)["id"]) + 1;
}

function getSanitizedValue($value)
{
	return htmlspecialchars(trim($value));
}
