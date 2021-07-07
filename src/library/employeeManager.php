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
  $employeesData = file_get_contents($BASE_URL . '/resources/employees.json');
  return json_decode($employeesData);
}

function getEmployee(string $id)
{
  session_start();
  $BASE_URL = $_SESSION["BASE_URL"];
  $employeesData = file_get_contents($BASE_URL . '/resources/employees.json');
  $decodeEmployee = json_decode($employeesData);
  $foundEmployee = array_filter($decodeEmployee, function ($employee) use ($id) {
    return $employee["id"] == $id;
  });
  return $foundEmployee;
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
