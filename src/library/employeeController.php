<?php
$jsonString = file_get_contents("../../resources/employees.json");
$employees = json_decode($jsonString, true);

// ! To update the json
// $newJsonString = json_encode($data);
// file_put_contents('jsonFile.json', $newJsonString);

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $result = $employees;
        break;
}

header("Content-Type: application/json");
echo json_encode($result);
