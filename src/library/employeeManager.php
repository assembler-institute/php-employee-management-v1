<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

require_once("loginManager.php");

function addEmployee(array $newEmployee)
{
    // Verify the file path exist
    $jsonPath = '../../resources/employees.json';
    if (!file_exists($jsonPath)) return 'Invalid path';

    // Get JSON and update it
    $jsonArray = getJson($jsonPath);
    $idArray = [];
    $newJson = [];
    foreach ($jsonArray as $entry) {

        $newJson[] = $entry;
        $idArray[] = $entry["id"];
    }

    //Get max value from the ID Array to add the next ID

    $newId = max($idArray) + 1;
    $newEmployee["id"] = $newId;
    $newJson[] = $newEmployee;

    if (!file_put_contents($jsonPath, json_encode($newJson, JSON_PRETTY_PRINT))) {

        return "Failed to save data into json file";
    }

    return "Employee Added Successfully";
}


function deleteEmployee($id)
{

    // Verify the file path exist
    $jsonPath = '../../resources/employees.json';
    if (!file_exists($jsonPath)) return 'Invalid path';

    // Get JSON and update it
    $jsonArray = getJson($jsonPath);
    $newJson = [];
    foreach ($jsonArray as $entry) {
        if ($entry['id'] !== $id) {
            $newJson[] = $entry;
        }
    }

    if (!file_put_contents($jsonPath, json_encode($newJson, JSON_PRETTY_PRINT))) {

        return "Failed to save data into json file";
    }

    return "Updated succesfully!";
}


function updateEmployee($newDataEmployee)
{
  $jsonPath = "../../resources/employees.json";
  $employees = getJson($jsonPath);
  $updatedEmployees = [];

  if (!file_exists($jsonPath)) return 'Invalid path';

  foreach ($employees as $employee) {
    if ((int)$employee['id'] === (int)$newDataEmployee['id']) {
      $updatedEmployees[] = $newDataEmployee;
    } else {
      $updatedEmployees[] = $employee;
    }
  }

  if (!file_put_contents($jsonPath, json_encode($updatedEmployees, JSON_PRETTY_PRINT))) {
    return "Failed to save data into json file";
  }

  return 'Employee updated succesfully';
}


function getEmployee(string $id)
{

    $employees = getJson("../resources/employees.json");

    foreach ($employees as $employee) {

        if ((int)$employee["id"] === (int)$id) return $employee;
    }

    return ("Employee not found");
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
