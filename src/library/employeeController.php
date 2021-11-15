<?php
require("./employeeManager.php");
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
  case 'GET':
    $jsonEmployees = file_get_contents("../../resources/employees.json");
    echo $jsonEmployees;
    break;

  case 'PUT':
    $employeeFix = [];
    $array_employee = file_get_contents('php://input');
    $array_employee = explode('&', $array_employee);
    foreach ($array_employee as $index => $item) {
      $fixDate = explode('=', urldecode($item));
      if ($fixDate[0] == 'id') {
        $employeeFix[$fixDate[0]] = intval($fixDate[1]);
      } else {
        $employeeFix[$fixDate[0]] = $fixDate[1];
      }
    }
    $edit = updateEmployee($employeeFix);
    break;

  case "POST":
    if (!isset($_GET['update'])) {
      $newEmployee = $_POST;
      $result = addEmployee($newEmployee);
      break;
    }

  case 'DELETE':
    parse_str(file_get_contents("php://input"), $_DELETE);
    $employeeID = $_DELETE['id'];
    $result = deleteEmployee($employeeID);
    break;

  default:
    echo ("error");
    break;
}
