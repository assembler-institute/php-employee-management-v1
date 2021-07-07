<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function getAllEmployees($data) {
  $data = file_get_contents("../../resources/employees.json");
  $data = json_decode($data, true);
  return $data;
}

function addEmployee(array $newEmployee)
{
  $json = file_get_contents("../../resources/employees.json"); 
  $json = json_decode($json, true);
  $allEmployes = getAllEmployees($json);
  $lastId = getNextIdentifier($allEmployes);
  $newEmployee["id"] = $lastId + 1;
  $json[] = $newEmployee; 
  file_put_contents("../../resources/employees.json", json_encode($json));
  http_response_code(201);
  // return $json; //devuelve string;
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
// TODO implement it
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
