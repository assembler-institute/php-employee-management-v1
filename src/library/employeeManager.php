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
