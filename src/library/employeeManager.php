<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
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
        "id" => (string)(count($employeesData) + 1),
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

    $_SESSION["message"] = "Successfully add new employee";

    // header("Location: ./../dashboard.php?addNew");
    header("Location: ./../employee.php");
    exit;
}


function deleteEmployee(string $id)
{
    $employeesJsonFile = "./../../resources/employees.json";
    $id = $_GET["id"];

    // read and decode json file
    if(file_exists($employeesJsonFile)) {
        $jsonData = file_get_contents($employeesJsonFile);
        $employeesData = json_decode($jsonData, true);
    }

    // get array index to delete
    $array_index = array();
    foreach ($employeesData as $key => $value) {
        if ($value["id"] == $_GET["id"]) {
            $array_index[] = $key;
        }
    }

    // delete data
    foreach ($array_index as $i) {
        unset($employeesData[$i]);
    }

    // rebase array
    $employeesData = array_values($employeesData);

    // Convert employees data to Json
    $jsonData = json_encode($employeesData, JSON_PRETTY_PRINT);

    // Save employees data to "resources/employees.json"
    file_put_contents($employeesJsonFile, $jsonData);

    header("Location: ./../dashboard.php?delete");
    exit();
}


function updateEmployee(array $updateEmployee)
{
// TODO implement it
}


function getEmployee(string $id)
{
    if(file_exists($employeesJsonFile)) {
        $jsonData = file_get_contents($employeesJsonFile);
        $employeesData = json_decode($jsonData, true);
    }
    foreach($employeesData as $employee) {
        if ($employee["id"] === $id) {
            return $employee;
        }
    }
    return null;
}


function removeAvatar($id)
{
// TODO implement it
}


function getQueryStringParameters($url): array
{
    // $url = $_SERVER['REQUEST_URI']
    $query = parse_url($url, PHP_URL_QUERY);
    parse_str($query, $queryArray);
    return $queryArray;
}

function getNextIdentifier(array $employeesCollection): int
{
// TODO implement it
}
