<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */
session_start();

function getAllEmployees($path) {
  $data = file_get_contents($path);
  $data = json_decode($data, true);
  return $data;
}

function addEmployee(array $newEmployee)
{
  $path = "../../resources/employees.json";
  $allEmployees = getAllEmployees($path);
  $lastId = getNextIdentifier($allEmployees);
  $newEmployee["id"] = $lastId + 1;
  $allEmployees[] = $newEmployee; 
  file_put_contents("../../resources/employees.json", json_encode($allEmployees));
  http_response_code(201);
}


function deleteEmployee($id)
{
  $path = "../../resources/employees.json";
  $allEmployees = getAllEmployees($path);
  foreach($allEmployees as $key => $value) {
    if ($value['id'] == $id) {
      $employeeToDelete = $key;
    }
  }
  unset($allEmployees[$employeeToDelete]);
  $allEmployees = array_values($allEmployees);
  file_put_contents("../../resources/employees.json", json_encode($allEmployees));
}


function updateEmployee(array $updateEmployee)
{
// TODO implement it
}


function getEmployee(string $id)
{

  $json = file_get_contents("../../resources/employees.json"); 
  $json = json_decode($json, true);
  foreach($json as $key => $value) {
    if ($value['id'] == $id) {
      if(!isset($value['lastName'])){
        $value['lastName']="";
      }
      if(!isset($value['gender'])){
        $value['gender']="";
      }
      var_dump($value);
      $_SESSION['employeeUpdate'] = $value;
      header("Location: ../employee.php");
    }
  }
}


function removeAvatar($id)
{
// TODO implement it
}


// function getQueryStringParameters(): array
// {
// // TODO implement it
// }

function getNextIdentifier(array $employeesCollection) 
{   
  $object = array_reduce($employeesCollection, function ($a, $b) {
    return $a ? ($a["id"] > $b["id"] ? $a : $b) : $b;
  });
  return $object["id"];
}
