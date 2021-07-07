<?php
require("employeeManager.php");

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        header("Content-Type: application/json");
        getAllEmployees();
        //Add if identifier
        break;
    case "PUT":
        // updateEmployee($_POST["updatedEmployee"]);
        break;
    case "POST":
        addEmployee($_POST["newEmployee"]);
        break;
    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        deleteEmployee($_DELETE["deletedID"]);
        break;
    default:
        echo "Not valid method";
}
