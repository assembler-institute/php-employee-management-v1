<?php
include "./employeeManager.php";

header("Content-Type: application/json");

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $jsonString = file_get_contents("../../resources/employees.json");
        echo $jsonString;
        break;
    case "POST":
        echo json_encode(addEmployee($_POST));
        break;
    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        echo json_encode(deleteEmployee($_DELETE["id"]));
        // deleteEmployee($_DELETE);

        break;
}
