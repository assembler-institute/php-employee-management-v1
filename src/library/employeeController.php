<?php
$employees = json_decode(file_get_contents("../../resources/employees.json"), true);
// print_r($employees); // print array

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $result = $employees;
        break;
}

header("Content-Type: application/json");
echo json_encode($result);
