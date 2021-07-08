<?php
//session_start();
require("./employeeManager.php");

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":

        if (isset($_GET["employeeRowId"])) {
            getEmployee($_GET["employeeRowId"]);
        } else {
            header("Content-Type: application/json");
            getAllEmployees();
        }
        break;
    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);
        $updatedItem=$_PUT["updatedEmployee"];               
        updateEmployee($updatedItem);
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
