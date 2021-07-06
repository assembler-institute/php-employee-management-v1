<?php
include "./employeeManager.php";

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $jsonString = file_get_contents("../../resources/employees.json");
        header("Content-Type: application/json");
        echo $jsonString;
        break;
    case "POST":
        header("Content-Type: application/json");
        echo json_encode(addEmployee($_POST));
        break;
    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        header("Content-Type: application/json");
        echo json_encode(deleteEmployee($_DELETE["id"]));
        // deleteEmployee($_DELETE);

        break;
}
