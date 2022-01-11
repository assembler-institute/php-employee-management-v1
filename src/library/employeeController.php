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
