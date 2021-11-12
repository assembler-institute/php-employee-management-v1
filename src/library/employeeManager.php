<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 */

function addEmployee(array $newEmployee)
{
  $storagePath = "../../resources/employees.json";

  $employeesCollection = json_decode(file_get_contents($storagePath, true));
  $newEmployee['id'] = getNextIdentifier($employeesCollection);
  array_push($employeesCollection, $newEmployee);

  $jsonData = json_encode($employeesCollection);
  file_put_contents($storagePath, $jsonData);

  return true;
}

function deleteEmployee(string $id)
{
  $storagePath = "../../resources/employees.json";
  $employeesCollection = json_decode(file_get_contents($storagePath, true));

  foreach ($employeesCollection as $index => $employee) {
    if ($employee->id == $id) {
      unset($employeesCollection[$index]);
      break;
    }
  }

  $jsonData = json_encode($employeesCollection);
  file_put_contents($storagePath, $jsonData);

  return true;
}

function updateEmployee(array $updatedEmployee)
{
  $storagePath = "../../resources/employees.json";
  $employeesCollection = json_decode(file_get_contents($storagePath, true));

  foreach ($employeesCollection as $index => $employee) {
    if ($employee->id == $updatedEmployee['id']) {
      $employeesCollection[$index] = $updatedEmployee;
      break;
    }
  }

  $jsonData = json_encode($employeesCollection);
  file_put_contents($storagePath, $jsonData);

  return true;
}

function getEmployee(string $id)
{
  $storagePath = "../../resources/employees.json";
  $employeesCollection = json_decode(file_get_contents($storagePath, true));

  return $employeesCollection;
}


function removeAvatar($id)
{
  $storagePath = "../../resources/employees.json";
  $employeesCollection = json_decode(file_get_contents($storagePath, true));
}


function getQueryStringParameters(): array
{
  // TODO implement it
}

function getNextIdentifier(array $employeesCollection): int
{
  return intval(count($employeesCollection) + 1);
}
