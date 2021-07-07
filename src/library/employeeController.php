<?php
require("employeeManager.php");
//header("Content-Type: application/json");
$method = $_SERVER["REQUEST_METHOD"];
parse_str(file_get_contents("php://input"), $_PUT);
echo "hola";

switch ($method) {
    case "GET":
        getEmployee();
        break;
    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);
        $modifyItem=json_encode([$_PUT["updatedEmployee"]],true);
        echo $modifyItem;
        //updateEmployee($modifyItem);
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
