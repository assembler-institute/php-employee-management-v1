<?php
require("./employeeManager.php");
$method = $_SERVER['REQUEST_METHOD'];

header("Content-Type: application/json");

switch ($method) {
  case "POST":
    // var_dump($_POST);
    $newEmployee = $_POST;
    echo addEmployee($newEmployee);
    break;

   case 'GET':
    //echo var_dump($_GET);
    $idEmployee = $_GET['ID'];
    getEmployee($idEmployee);
    break;
    
  case "DELETE":
    parse_str(file_get_contents("php://input"), $_DELETE);
    $employeeID = $_DELETE['id']; //This is the id of the employee clicked on.
    var_dump(deleteEmployee($employeeID));
}
?>