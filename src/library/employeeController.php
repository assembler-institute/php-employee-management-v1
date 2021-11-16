<?php
require("./employeeManager.php");
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
  case 'GET':
    $jsonEmployees = file_get_contents("../../resources/employees.json");
    echo $jsonEmployees;
    break;

  case 'PUT':
    $employeeEdit = [];
    $array_employee = file_get_contents('php://input');
    $array_employee = explode('&', $array_employee);
    foreach ($array_employee as $index => $item) {
      $EditDate = explode('=', urldecode($item));
      if ($EditDate[0] == 'id') {
        $employeeEdit[$EditDate[0]] = intval($EditDate[1]);
      } else {
        $employeeEdit[$EditDate[0]] = $EditDate[1];
      }
    }
    updateEmployee($employeeEdit);
    break;

  case "POST":
    if (!isset($_GET['update'])) {
      $newEmployee = $_POST;
      $result = addEmployee($newEmployee);
      break;
    }
    if ($_GET["update"] == true && isset($_SESSION['employeeUpdate'])) {
      updateEmployee($_SESSION['employeeUpdate'], $_POST);
      break;
    }
    if ($_GET["update"] == true) {
      $newEmployee = $_POST;
      $result = addEmployee($newEmployee);
      $_SESSION['newEmployee'] = $result;
      header("Location: ../employee.php?okUpdate");
      header("Location: ../employee.php?okUpdate");
      break;
    }


  case 'DELETE':
    parse_str(file_get_contents("php://input"), $_DELETE);
    $employeeID = $_DELETE['id'];
    $result = deleteEmployee($employeeID);
    break;

  default:
    echo "error";
    break;
}
