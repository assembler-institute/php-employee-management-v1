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
}


function deleteEmployee(string $id)
{
// TODO implement it
//get json
  $employees = file_get_contents("./../../resources/employees.json",true);
  //decode employees json
  $employees=json_decode($employees,true);
  //we search the id of the employee will be deleted
  $key=array_search($id,array_column($employees,"id"));
  //delete the key from the array
  if($key!==false){
    unset($employees[$key]);
  }
  //re-order:
  $employees = array_values($employees);
  //encode the json again
  $employees=json_encode($employees);
  //overwrite the changes
  file_put_contents("./../../resources/employees.json",$employees,FILE_USE_INCLUDE_PATH);
}


function updateEmployee(array $updateEmployee)
{
// TODO implement it
}


function getEmployee(string $id){
  $dataEmployee=  file_get_contents("./../resources/employees.json"); //obtiene el contenido del employee.json
  $arrayObj = json_decode($dataEmployee, true); //guarda en arrayObj el codificado en forma de array asociativo con objetos
  foreach ($arrayObj as $key => $value) {
      $employeeObj=$value; // obtiene un solo objeto del array actual
      if($employeeObj["id"]==$id){
          return $employeeObj;
      }
  }
}

function displayEmployee(){
  $employees = file_get_contents("./../../resources/employees.json",true);
    return print_r($employees);
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
