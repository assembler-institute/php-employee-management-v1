<?php
require_once "./library/employeeManager.php";

if(isset($_POST["submitAdd"])){
  $current_data=file_get_contents('../../resources/employees.json');
  $array_data=json_decode($current_data,true);
  echo(count($array_data));
  $newEmployee=array(
    "id"=>count($array_data)+1,
    "name"=>$_POST["name"],
    "lastName"=>$_POST["lastName"],
    "email"=>$_POST["email"],
    "gender"=>$_POST["gender"],
    "city"=>$_POST["city"],
    "streetAddress"=>$_POST["streetAddress"],
    "state"=>$_POST["state"],
    "age"=>$_POST["age"],
    "postalCode"=>$_POST["postalCode"],
    "phoneNumber"=>$_POST["phoneNumber"]
);
addEmployee($newEmployee);
}

if(isset($_POST["delete"])){
deleteEmployee($_POST["id"]);
}
if (isset($_POST["submitAdd"])){
  $newEmployee=array(
    "id"=>$_POST["id"],
    "name"=>$_POST["name"],
    "lastName"=>$_POST["lastName"],
    "email"=>$_POST["email"],
    "gender"=>$_POST["gender"],
    "city"=>$_POST["city"],
    "streetAddress"=>$_POST["streetAddress"],
    "state"=>$_POST["state"],
    "age"=>$_POST["age"],
    "postalCode"=>$_POST["postalCode"],
    "phoneNumber"=>$_POST["phoneNumber"]
);
  updateEmployee($newEmployee);
}

