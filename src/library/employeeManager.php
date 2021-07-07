<?php

function addEmployee(array $employeeData)
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

function getEmployees()
{
  session_start();
  $BASE_URL = $_SESSION["BASE_URL"];
  $employeesData = file_get_contents($BASE_URL . "/resources/employees.json");
  return json_decode($employeesData);
}

function getEmployee(string $id)
{
  $employeesData = file_get_contents("../resources/employees.json");
  $decodeEmployee = json_decode($employeesData, true);
  $foundEmployee = array_filter($decodeEmployee, function ($employee) use (
    $id
  ) {
    return $employee["id"] == $id;
  });
  return $foundEmployee[$id - 1];
}

function getLastIdFromEmployees()
{
  $employeesData = file_get_contents("../resources/employees.json");
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

function getQueryStringParameters(): array
{
  // TODO implement it return array
}

function getNextIdentifier(array $employeesCollection): int
{
  // TODO implement it
}
