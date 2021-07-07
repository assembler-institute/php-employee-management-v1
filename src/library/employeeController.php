<?php
require("./employeeManager.php");
//header("Content-Type: application/json");

//parse_str(file_get_contents("php://input"), $_PUT);



switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        header("Content-Type: application/json");
        getAllEmployees();
        //Add if identifier
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
