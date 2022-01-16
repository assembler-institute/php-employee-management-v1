<?php

  require_once("./employeeManager.php");

  // ADD EMPLOYEE
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newEmployeeData = trim(file_get_contents("php://input"));
    $newEmployee = json_decode($newEmployeeData, true);
    $employees = getEmployees();
    $id = getNextIdentifier($employees);
    $lastId = ["id"=>$id,"streetAddress"=>"","phoneNumber"=>"","gender"=>"","lastName"=>""];
    $employee = array_merge($lastId,$newEmployee);
    addEmployee($employee);
    echo json_encode($employee);
  }

  // UPDATE EMPLOYEE
  if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    if (isset($_GET["update"])){
      $updateEmployeeData = trim(file_get_contents("php://input"));
      $updatedEmployee = json_decode($updateEmployeeData, true);
      $employees = getEmployees();
      $employeeId = $_GET["id"];
      updateEmployee($updatedEmployee, $employeeId);
    }
  }

  // GET EMPLOYEE DATA
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $employeeId = $_GET["id"];
    $employee = getEmployee($employeeId);
    echo json_encode($employee);
  }
  
  // DELETE EMPLOYEE
  if ($_SERVER["REQUEST_METHOD"] == "DELETE" ) {
    $id = trim(file_get_contents("php://input"));
    deleteEmployee($id);
  }
  
  // VIEW EMPLOYEE DETAILS in the Employee section
  if (isset($_GET["v"])) {
    if( $_GET["v"]=="view"){
      $id = $_GET["id"];
      header("Location:../employee.php?v=view&id=$id");
    }
  }