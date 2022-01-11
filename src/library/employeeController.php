<?php
require_once("./employeeManager.php");
// add employee
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $newEmployeeData = trim(file_get_contents("php://input"));
//   $newEmployee = json_decode($newEmployeeData, true);
//   $employees = getEmployees();
//   $id = getNextIdentifier($employees);
//   $lastId = ["id"=>$id,"streetAddress"=>"","phoneNumber"=>"","gender"=>"","lastName"=>""];
//   $employee = array_merge($lastId,$newEmployee);
//   addEmployee($employee);
//   echo json_encode($employee);
// }

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
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $id = trim(file_get_contents("php://input"));
  echo "id";
  deleteEmployee($id);
}

