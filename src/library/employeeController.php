<?php
require("./employeeManager.php");
$method = $_SERVER['REQUEST_METHOD'];
$path = "../../resources/employees.json";


switch ($method) {
  case "POST":
    $newEmployee = $_POST;
    $result = addEmployee($newEmployee);
    break;
   case 'GET':
    //echo var_dump($_GET);
    $idEmployee = $_GET['ID'];
    getEmployee($idEmployee);
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