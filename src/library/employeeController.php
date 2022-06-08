<?php
require_once "./employeeManager.php";

$httpMethod = $_SERVER["REQUEST_METHOD"];

if ($httpMethod === "GET") {

    if(isset($_GET['call_type'])){
        callType();
        exit;
    }

    $employees = getEmployees();
    echo json_encode($employees);
}


?>