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
$newCollections = json_decode(file_get_contents('../../resources/employees.json'), true);
$newEmployee['id'] = getNextIdentifier($newCollections);
$newEmployee['age'] = intval($newEmployee['age']);

if (!isset($newEmployee['gender'])) {
  $newEmployee['gender'] = "";
}
if (!isset($newEmployee['lastName'])) {
  $newEmployee['lastName'] = "";
}
array_push($newCollections, $newEmployee);
file_put_contents('../../resources/employees.json', json_encode($newCollections, JSON_PRETTY_PRINT));
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


function getQueryStringParameters(): array
{
// TODO implement it
}

function getNextIdentifier(array $employeesCollection): int
{
// TODO implement it
// $lastId = [];
for ($i=0; $i <= count($employeesCollection); $i++){
  $lastId = $i;
};
return $lastId + 1;
}
