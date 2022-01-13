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
// TODO implement it
  $employees = invokeEmployees();
  $newId=getNextIdentifier($employees);
  print_r($newEmployee["id"]);
  //we push into the employees array
  $newEmployee["id"]=$newId;
  print_r($newEmployee["id"]);

  //fill the empty values
  //if(count($newEmployee)==6){
    //$newEmployee["lastname"]="";
    //$newEmployee["gender"]="";
    //$newEmployee["state"]="";
    //$newEmployee["postalCode"]="";
    //$newEmployee["phoneNumber"]="";
  //}
  array_push($employees,$newEmployee);
 //encode the json again
  $employees=json_encode($employees);
  //overwrite the changes
  file_put_contents("./../../resources/employees.json",$employees,FILE_USE_INCLUDE_PATH);

}


function deleteEmployee(string $id)
{
// TODO implement it
  $employees = invokeEmployees();
  //we search the key of the employee will be deleted by the id introduced
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
  $dataEmployee=  file_get_contents("./../../resources/employees.json"); //obtiene el contenido del employee.json
  $arrayObj = json_decode($dataEmployee, true); //guarda en arrayObj el codificado en forma de array asociativo con objetos
  foreach ($arrayObj as $key => $value) {
      $employeeObj=$value; // obtiene un solo objeto del array actual
      if($employeeObj["id"]==$id){
        $employeeObj=json_encode($employeeObj); //convierte el objeto en un json
          return print_r($employeeObj);
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
// TODO implement it
//lets see what is the last employee in array
  $lastEmployee=end($employeesCollection);
  //extract the id to integer and sum 1
  $newId=intval($lastEmployee["id"],10)+1;
  //the result of the sum will be the id of the last employee introduced
  return $newId;



}
