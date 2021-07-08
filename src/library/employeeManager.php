<?php

if (!isset($_SESSION)) {
  session_start();
}

function addEmployee(array $newEmployeeData)
{
	$BASE_URL = $_SESSION["BASE_URL"];
	$pastEmployees = getEmployeesFromArray();
	array_push($pastEmployees, $newEmployeeData);
	$updatedEmployees = json_encode($pastEmployees);
	file_put_contents($BASE_URL . "/resources/employees.json", $updatedEmployees);
	return true;
}

function deleteEmployee(string $id)
{
  $employees = json_decode(file_get_contents("../../resources/employees.json"), true);
  $foundEmployee = array_reduce(
    $employees,
    function ($found, $employee) use ($id) {
      return intval($employee["id"]) === intval($id) ? $employee : $found;
    },
    []
  );
  $otherEmployees = array_filter(
    $employees,
    function ($employee) use ($id) {
      return intval($employee["id"]) !== intval($id);
    }
  );
  $updatedEmployees = array_values($otherEmployees);
  file_put_contents("../../resources/employees.json", json_encode($updatedEmployees));
  return $foundEmployee;
}

function updateEmployee(array $updateEmployee)
{
	$BASE_URL = $_SESSION["BASE_URL"];
	$pastEmployees = getEmployeesFromArray();
	$updatedArray = [];
	foreach($pastEmployees as $selected){
		if ($selected["id"] == $updateEmployee["id"]) {
			array_push($updatedArray, $updateEmployee);
		} else{
			array_push($updatedArray, $selected);
		};
	}
	$updatedEmployees = json_encode($updatedArray);
	file_put_contents($BASE_URL . "/resources/employees.json", $updatedEmployees);
	return true;

}

function getEmployees()
{
  // session_start();
  $BASE_URL = $_SESSION["BASE_URL"];
  $employeesData = file_get_contents($BASE_URL . "/resources/employees.json");
  return json_decode($employeesData);
}

function getEmployeesFromArray()
{
  // session_start();
  $BASE_URL = $_SESSION["BASE_URL"];
  $employeesData = file_get_contents($BASE_URL . "/resources/employees.json");
  return json_decode($employeesData, true);
}

function getEmployee(string $id)
{
  $employeesData = file_get_contents("../resources/employees.json");
  $decodeEmployee = json_decode($employeesData, true);
  $foundEmployee = array_reduce($decodeEmployee, function ($found, $employee) use (
    $id
  ) {
    return intval($employee["id"]) === intval($id) ? $employee : $found;
  });
  return $foundEmployee;
}

function getLastIdFromEmployees()
{
  // session_start();
  $BASE_URL = $_SESSION["BASE_URL"];
  $employeesData = file_get_contents($BASE_URL . "/resources/employees.json");
  $decodeEmployee = json_decode($employeesData, true);
  return getNextAvailableEmployeeId($decodeEmployee);
}

function getNextAvailableEmployeeId($employeesData)
{
  return max(
    array_map(function ($employee) {
      return intval($employee["id"]);
    }, $employeesData)
  ) + 1;
}

function removeAvatar($id)
{
  // TODO implement it
}

function getQueryStringParameters()
{
  // TODO implement it return array
}

function getNextIdentifier(array $employeesCollection)
{
  // TODO implement it
}
