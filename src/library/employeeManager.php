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

if (!isset($newEmployee['gender'])) {
  $newEmployee['gender'] = "";
}
if (!isset($newEmployee['lastName'])) {
  $newEmployee['lastName'] = "";
}
if (isset($newEmployee["flag"])){
  unset($newEmployee["flag"]);
  header("Location:../dashboard.php?flag=1");
}
array_push($newCollections, $newEmployee);
file_put_contents('../../resources/employees.json', json_encode($newCollections, JSON_PRETTY_PRINT));
}


function deleteEmployee(string $id)
{
// TODO implement it
$employeesCollection = json_decode(file_get_contents('../../resources/employees.json'), true); //convierte a varible de php (array)
intval($id);
for ($i = 0; $i <count($employeesCollection); $i++){
  if($employeesCollection[$i]['id'] == $id){
    array_splice($employeesCollection, $i, 1);
  }
}
file_put_contents('../../resources/employees.json', json_encode($employeesCollection, JSON_PRETTY_PRINT));
}


function updateEmployee(array $updateEmployee)
{
// TODO implement it
$newCollections = json_decode(file_get_contents('../../resources/employees.json'), true);
for ($i=0; $i < count($newCollections); $i++) {
  if ($updateEmployee["id"] == $newCollections[$i]["id"]){
    break;
  }
}
$replaceArray = array($i => $updateEmployee);
$newCollections = array_replace($newCollections, $replaceArray);
file_put_contents('../../resources/employees.json', json_encode($newCollections, JSON_PRETTY_PRINT));
if (isset($updateEmployee["form"])){
    unset($updateEmployee["form"]);
    header("Location:../dashboard.php");
}
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
