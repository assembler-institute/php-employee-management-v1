<?php

session_start();

$employeesJsonFile = "./../../resources/employees.json";

if(file_exists($employeesJsonFile)) {
    // If employees database exist, load all employees
    $jsonData = file_get_contents($employeesJsonFile);
    $employeesData = json_decode($jsonData, true);
} else {
    $employeesData = [];
}

// Add new employee data to array
$employeesData[] = [
    "id" => count($employeesData) + 1,
    "name" => isset($_POST["name"]) ? $_POST["name"] : "",
    "lastName" => isset($_POST["lastName"]) ? $_POST["lastName"] : "",
    "email" => isset($_POST["email"]) ? $_POST["email"] : "",
    "gender" => isset($_POST["gender"]) ? $_POST["gender"] : "",
    "city" => isset($_POST["city"]) ? $_POST["city"] : "",
    "streetAddress" => isset($_POST["streetAddress"]) ? $_POST["streetAddress"] : "",
    "state" => isset($_POST["state"]) ? $_POST["state"] : "",
    "age" => isset($_POST["age"]) ? $_POST["age"] : "",
    "postalCode" => isset($_POST["postalCode"]) ? $_POST["postalCode"] : "",
    "phoneNumber" => isset($_POST["phone"]) ? $_POST["phone"] : "",
];

// Convert employees data to Json
$jsonData = json_encode($employeesData, JSON_PRETTY_PRINT);

// Save employees data to "resources/employees.json"
file_put_contents($employeesJsonFile, $jsonData);

$_SESSION["message"] = "AddNewEmployee";

header("Location: ./../dashboard.php?addNew");
// header("Location: ./../employee.php");
exit;
?>