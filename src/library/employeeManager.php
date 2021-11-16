<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */
session_start();

function getAllEmployees()
{
  $data = file_get_contents("../../resources/employees.json");
  $data = json_decode($data, true);
  return $data;
}


function addEmployee($newEmployee)
{
  $employees = getAllEmployees();
  $newId = 1 + getNextIdentifier($employees);
  $newEmployee["id"] = $newId;
  array_push($employees, $newEmployee);
  file_put_contents("../../resources/employees.json", json_encode($employees));
}


function deleteEmployee($id)
{
  $allEmployees = getAllEmployees();
  foreach ($allEmployees as $key => $value) {
    if ($value['id'] == $id) {
      $employeeToDelete = $key;
    }
  }
  unset($allEmployees[$employeeToDelete]);
  $allEmployees = array_values($allEmployees);
  file_put_contents("../../resources/employees.json", json_encode($allEmployees));
  // header("Location: ../dashboard.php?deletedItem");
  return $employeeToDelete;
}


function updateEmployee($updateEmployee)

{
  $employees = getAllEmployees(); //convierte a varible de php (array)
  foreach ($employees as $index => $employee) {
    if ($employee['id'] == $updateEmployee['id']) {
      $employees[$index] = $updateEmployee;
    }
  }
  file_put_contents('../../resources/employees.json', json_encode($employees, JSON_PRETTY_PRINT));
  return true;
}



function getNextIdentifier($employeesCollection)
{
  $object = array_reduce($employeesCollection, function ($a, $b) {
    return $a ? ($a["id"] > $b["id"] ? $a : $b) : $b;
  });
  return $object["id"];
}


// function removeAvatar($id)
// {
//   // TODO implement it
// }


// function getQueryStringParameters(): array
// {
//   // TODO implement it
// }
