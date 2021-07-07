<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
// TODO implement it
}


function deleteEmployee(string $id)
{
// TODO implement it
}


function updateEmployee(array $updateEmployee)
{
// TODO implement it
}


function getEmployee(string $id)
{
	$employeesData = file_get_contents('../../resources/employees.json');
  $decodeEmployee = json_decode($employeesData);
	$foundEmployee = array_filter($decodeEmployee, function($employee) use ($id) { return $employee["id"] == $id;});
	return $foundEmployee;
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
