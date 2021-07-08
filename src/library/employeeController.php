<?php
//session_start();
require("./employeeManager.php");

//header("Content-Type: application/json");

//parse_str(file_get_contents("php://input"), $_PUT);



switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        
        if(isset($_GET["employeeRowId"])){
            getEmployee($_GET["employeeRowId"]);
        }else{
            header("Content-Type: application/json");
            getAllEmployees();
        }
        break;
    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);
        $updatedItem=$_PUT["updatedEmployee"];
        
        // $modifyItem=json_encode([$_PUT["updatedEmployee"]],true);
        // echo $modifyItem;
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
