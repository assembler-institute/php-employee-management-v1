<?php
require_once("./employeeManager.php");
// add employee
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $newEmployeeData = trim(file_get_contents("php://input"));
  $newEmployee = json_decode($newEmployeeData, true);
  $employees = getEmployees2();
  $lastId = ["id"=>getNextIdentifier($employees),"streetAddress"=>"","phoneNumber"=>"","gender"=>"","lastName"=>""];
  $employee = array_merge($lastId,$newEmployee);
  addEmployee($employee);
}

if (isset($_GET["d"])) {
  $id = $_GET["id"];
  deleteEmployee($id);
}
if (isset($_GET["v"])) {
  if( $_GET["v"]=="update"){
    $id = $_GET["id"];
    header("Location:../employee.php?v=update&id=$id");
  }
}
if (isset($_GET["v"])) {
  if( $_GET["v"]=="view"){
    $id = $_GET["id"];
    header("Location:../employee.php?v=view&id=$id");
  }
}


