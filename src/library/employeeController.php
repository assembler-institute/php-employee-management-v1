<?php
require("./employeeManager.php");
$method = $_SERVER['REQUEST_METHOD'];

header("Content-Type: application/json");

switch ($method) {
  case "GET":
    $path = "../../resources/employees.json";
    var_dump(getAllEmployees($path));
    header("Refresh:2");
    break;
  case "POST":
    $newEmployee = $_POST;
    addEmployee($newEmployee);
    header("Refresh:2");
    break;
  case "DELETE":
    parse_str(file_get_contents("php://input"), $_DELETE);
    $employeeID = $_DELETE['id'];
    (deleteEmployee($employeeID));
    break;
}
?>