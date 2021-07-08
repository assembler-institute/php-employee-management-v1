<?php
require("./employeeManager.php");
$method = $_SERVER['REQUEST_METHOD'];
$path = "../../resources/employees.json";


switch ($method) {
  case "POST":
    if(!isset($_GET['update'])){
      $newEmployee = $_POST;
      $result = addEmployee($newEmployee);
      break;
    }
    if($_GET["update"] == true && isset($_SESSION['employeeUpdate'])){
      updateEmployee($_SESSION['employeeUpdate'],$_POST);
      break;
    }
    if($_GET["update"] == true && !isset($_SESSION['employeeUpdate'])){
      $newEmployee = $_POST;
      $result = addEmployee($newEmployee);
      $_SESSION['newEmployee'] = $result;
      header("Location: ../employee.php?okUpdate=true");
      break;
    }
    break;

  case 'GET':
    if($_GET["ID"]){
      $idEmployee = $_GET['ID'];
      getEmployee($idEmployee);
    }
    break;

  case "DELETE":
    parse_str(file_get_contents("php://input"), $_DELETE);
    $employeeID = $_DELETE['id'];
    $result = deleteEmployee($employeeID);
    break;
}

header("Content-Type: application/json");
echo json_encode($result);
?>