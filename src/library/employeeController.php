<?php
require_once "./employeeManager.php";
//if detected add option
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
//detected delete option
if(isset($_POST["delete"])){
deleteEmployee($_POST["id"]);
}
//detected update option
if (isset($_POST["changeEmployee"])){
  echo "WORK";echo "<br>";
  echo $_POST["data"];
  /*$newEmployee=array(
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
  updateEmployee($newEmployee);*/
}

/*if($_SERVER["REQUEST_METHOD"]=="PUT"){
  echo "WORK";echo "<br>";
 //echo parse_str(file_get_contents("php//input"),$_PUT);
}*/