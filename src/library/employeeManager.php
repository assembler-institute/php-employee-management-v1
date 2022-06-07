<?php
// /**
//  * EMPLOYEE FUNCTIONS LIBRARY
//  *
//  * @author: Jose Manuel Orts
//  * @date: 11/06/2020
//  */

function addEmployee(array $newEmployee) {
	$employeeArray = json_decode(file_get_contents("../../resources/employees.json"), true);
	$newArray = array();
	$id = Array();

	foreach($employeeArray as $employee) {
		$id[] = $employee["id"];
	}
echo $id;
	$newId = max($id) + 1;
	$newArray = array(
		"id" => $newEmployee[$newId],
		"name" => $newEmployee["name"],
		"email" => $newEmployee["email"],
		"age" => $newEmployee["age"],
		"streetAddress" => $newEmployee["streetAddress"],
		"city" => $newEmployee["city"],
		"state" => $newEmployee["state"],
		"postalCode" => $newEmployee["postalCode"],
		"phoneNumber" => $newEmployee["phoneNumber"],
	);

	array_push($employeeArray, $newArray);

	file_put_contents("../../resources/employees.json", json_encode($employeeArray));
// TODO implement it
}

function deleteEmployee(string $id) {
	$employeesArray = json_decode(file_get_contents("../../resources/employees.json"), true);
	$newArray = array();

	foreach($employeesArray as $index => $employee) {
		if($employee["id"] === $id) {
			unset($employeesArray[$index]);
		} else {
			array_push($newArray, $employee);
		}
	}
	file_put_contents("../../resources/employees.json", json_encode($newArray));
}

function updateEmployee(array $updateEmployee) {
	$employeeArray = json_decode(file_get_contents("../../resources/employees.json"));
	 $id = 0;
	foreach($employeeArray as $employee) {
		$id ++;
	}
// TODO implement it
	echo print_r($employeeArray);

}


function getEmployee(string $id) {
// TODO implement it
}


function removeAvatar($id)
{
// TODO implement it
}


function getQueryStringParameters(): array
{
// TODO implement it
}

function getNextIdentifier(array $employeesCollection): int
{

// TODO implement it
}

function getEmployeesData() {
	echo file_get_contents("../../resources/employees.json");
}
