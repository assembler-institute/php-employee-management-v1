<?php
require("employeeManager.php");

$method = $_SERVER["REQUEST_METHOD"];


switch ($method) {
    case "GET":
        break;
    case "PUT":
        updateEmployee($_POST["updatedEmployee"]);
        break;
    case "POST":
        addEmployee($_POST["newEmployee"]);
        break;
        echo "Creating data";
    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        // deleteEmployee($_DELETE["deletedID"]);
        echo $_DELETE["deletedID"];
        break;
    default:
        echo "Not valid method";
}


// function employeePage()
// {
//     getEmployee();
// }
