<?php
require_once "./employeeManager.php";

$httpMethod = $_SERVER["REQUEST_METHOD"];

if ($httpMethod === "GET") {
    $employees = getEmployees();
    echo json_encode($employees);
}


?>