<?php
require("./employeeManager.php");
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'GET':
    $jsonEmployees = file_get_contents("../../resources/employees.json");
    echo $jsonEmployees;
    break;

  case 'PUT':
    // body
    break;

  case 'POST':
    // body
    break;

  case 'DELETE':
    parse_str(file_get_contents("php://input"), $_DELETE);
    $employeeID = $_DELETE['id'];
    $result = deleteEmployee($employeeID);
    break;

  default:
    echo ("error");
    break;
}
