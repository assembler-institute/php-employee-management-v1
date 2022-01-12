<?php
require_once("./employeeManager.php");
// add employee
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["add"])) {
  $newEmployeeData = trim(file_get_contents("php://input"));
  $newEmployee = json_decode($newEmployeeData, true);
  $employees = getEmployees();
  $id = getNextIdentifier($employees);
  $lastId = ["id"=>$id,"streetAddress"=>"","phoneNumber"=>"","gender"=>"","lastName"=>""];
  $employee = array_merge($lastId,$newEmployee);
  addEmployee($employee);
  echo json_encode($employee);
}
//update employee
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["update"])) {
  $updateEmployeeData = trim(file_get_contents("php://input"));
  $updatedEmployee = json_decode($updateEmployeeData, true);
  $employees = getEmployees();
  $employeeId = $_GET["id"];
  updateEmployee($updatedEmployee, $employeeId);
  echo json_encode($updatedEmployee);
}
//get employee data
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
  $employeeId = $_GET["id"];
  $employee = getEmployee($employeeId);
  echo json_encode($employee);
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
if ($_SERVER["REQUEST_METHOD"] == "POST" &&  isset($_GET["delete"]) ) {

  $id = trim(file_get_contents("php://input"));
  echo $_GET["delete"];
  deleteEmployee($id);
}
