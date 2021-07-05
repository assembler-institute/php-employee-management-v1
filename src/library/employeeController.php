<?php
include "./employeeManager.php";





switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $jsonString = file_get_contents("../../resources/employees.json");
        $employees = json_decode($jsonString, true);
        $result = $employees;
        break;
    case "POST":
        $result = addEmployee($_POST);
        break;
    case "DELETE":
        deleteEmployee($_DELETE);
        break;
}

header("Content-Type: application/json");
echo json_encode($result);
