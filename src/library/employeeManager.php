<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

 //get the json content function
 function invokeEmployees(){
    //get json
    $employees = file_get_contents("./../../resources/employees.json",true);
    //decode employees json
    return json_decode($employees,true); 
 }

function addEmployee(array $newEmployee)
{
  $employees = invokeEmployees();
  $newId=getNextIdentifier($employees);
  print_r($newEmployee["id"]);
  //we push into the employees array
  $newEmployee["id"]=$newId;
  array_push($employees,$newEmployee);
 //encode the json again
  $employees=json_encode($employees);
  //overwrite the changes
  file_put_contents("./../../resources/employees.json",$employees,FILE_USE_INCLUDE_PATH);

}


function deleteEmployee(string $id)
{
  $employees = invokeEmployees();
  //we search the key of the employee will be deleted by the id introduced
  $key=array_search($id,array_column($employees,"id"));
  //delete the key from the array if is not found
  if($key!==false){
    unset($employees[$key]);
  }
  //array re-order:
  $employees = array_values($employees);
  //encode the json again
  $employees=json_encode($employees);
  //overwrite the changes
  file_put_contents("./../../resources/employees.json",$employees,FILE_USE_INCLUDE_PATH);
}


function updateEmployee(array $updateEmployee)
{
  $employees = invokeEmployees();
  //we search the key of the employee will be deleted by the id introduced
  $key=array_search($updateEmployee["id"],array_column($employees,"id"));
  //we replace the employee
  $employees[$key]=$updateEmployee;
  //encode the json again
  $employees=json_encode($employees);
  //overwrite the changes
  file_put_contents("./../../resources/employees.json",$employees,FILE_USE_INCLUDE_PATH);

}


function getEmployee(string $id){
  $dataEmployee=  file_get_contents("./../../resources/employees.json"); //get the content of employees.json
  $arrayObj = json_decode($dataEmployee, true); //decode json as asociative array and saves in a variable
  foreach ($arrayObj as $key => $value) { // for each to find the id we passed as parameter
      $employeeObj=$value; // obtiene un solo objeto del array actual
      if($employeeObj["id"]==$id){
        $employeeObj=json_encode($employeeObj); //transform the obj in json
          return print_r($employeeObj); //return in print
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


function getQueryStringParameters()
{
// TODO implement it
}

function getNextIdentifier(array $employeesCollection)
{
//lets see what is the last employee in array
  $lastEmployee=end($employeesCollection);
  //extract the id to integer and sum 1
  $newId=intval($lastEmployee["id"],10)+1;
  //the result of the sum will be the id of the last employee introduced
  return $newId;



}
