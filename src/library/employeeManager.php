<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
  $json = file_get_contents("../../resources/employees.json"); //get the json;
  $json = json_decode($json, true); //transform the json string into an associative array
  $json[] = $newEmployee; //add the new employee to the json (as an array)
  file_put_contents("../../resources/employees.json", json_encode($json)); //save the json an encode it to be a string
  return $json; //devuelve string;
  //TODO check the last id, add 1 to the new employee's id, add the empty fields too.
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

// function getNextIdentifier(array $employeesCollection): int
// {
// // TODO implement it
// }
