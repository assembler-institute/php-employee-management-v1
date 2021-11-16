<?php

define("EMPLOYEES_JSON", RESOURCES . "/employees.json");

function addEmployee(array $newEmployee): bool
{
	try {
		$employeesCollection = json_decode(file_get_contents(EMPLOYEES_JSON), true);

		array_push($employeesCollection, $newEmployee);

		file_put_contents(EMPLOYEES_JSON, json_encode(array_values($employeesCollection), JSON_PRETTY_PRINT));

		return true;
	} catch (Throwable $e) {
		return false;
	}
}

function deleteEmployee(int $id)
{
	try {
		$employeesCollection = json_decode(file_get_contents(EMPLOYEES_JSON), true);

		foreach ($employeesCollection as $index => $employee) {
			if ($employee["id"] == $id) {
				unset($employeesCollection[$index]);
				file_put_contents(EMPLOYEES_JSON, json_encode(array_values($employeesCollection), JSON_PRETTY_PRINT));
				return true;
			}
		}

		return false;
	} catch (Throwable $e) {
		return false;
	}
}

function updateEmployee(array $updateEmployee): bool
{
	try {
		$employeesCollection = json_decode(file_get_contents(EMPLOYEES_JSON), true);

		foreach ($employeesCollection as $index => $employee) {
			if ($employee["id"] == $updateEmployee["id"]) {
				$employeesCollection[$index] = $updateEmployee;
				file_put_contents(EMPLOYEES_JSON, json_encode(array_values($employeesCollection), JSON_PRETTY_PRINT));
				return true;
			}
		}

		return true;
	} catch (Throwable $e) {
		return false;
	}
}

function getEmployee(int $id)
{
	try {
		$employeesCollection = json_decode(file_get_contents(EMPLOYEES_JSON), true);

		foreach ($employeesCollection as $employee) {
			if ($employee["id"] == $id) {
				return ($employee);
			}
		}
	} catch (Throwable $e) {
		return null;
	}
}

function getQueryStringParameters()
{
	$params = json_decode(file_get_contents('php://input'), true);

	return $params;
}

function getNextIdentifier(): int
{
	$employeesCollection = json_decode(file_get_contents(EMPLOYEES_JSON), true);

	return intval(end($employeesCollection)["id"]) + 1;
}

function removeAvatar($id)
{
	// TODO implement it
}
