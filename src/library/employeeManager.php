<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee()
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

    // Convert employees data to Json and save data to "resources/employees.json"
    $jsonData = json_encode($employeesData, JSON_PRETTY_PRINT);
    file_put_contents($employeesJsonFile, $jsonData);

    $_SESSION["message"] = "AddNewEmployee";

    header("Location: ./../dashboard.php?addNew");
    exit;
}


function deleteEmployee($id)
{
    session_start();

    $employeesJsonFile = "./../../resources/employees.json";
    $employeesData = checkFileExists($employeesJsonFile);

    // get array index to delete
    $array_index = array();
    foreach ($employeesData as $key => $value) {
        if ($value["id"] == $id) {
            $array_index[] = $key;
        }
    }

    // delete data
    foreach ($array_index as $i) {
        unset($employeesData[$i]);
    }

    // rebase array
    $employeesData = array_values($employeesData);

    $jsonData = json_encode($employeesData, JSON_PRETTY_PRINT);
    file_put_contents($employeesJsonFile, $jsonData);

    $_SESSION["message"] = "DeleteEmployee";

    header("Location: ./../dashboard.php?delete");
    exit();
}


function updateEmployee($data,int $id) {
    $employeesJsonFile = "./../resources/employees.json";
    $employeesData = checkFileExists($employeesJsonFile);

    foreach ($employeesData as $index => $employee) {
        if ($employee["id"] === $id) {
            $employeesData[$index] = array_merge($employee, $data);
        }
    }

    $jsonData = json_encode($employeesData, JSON_PRETTY_PRINT);
    file_put_contents($employeesJsonFile, $jsonData);

    header("Location: ./dashboard.php?update");
    exit();
}


function getEmployee(int $id)
{
    $employeesJsonFile = "./../resources/employees.json";
    $employeesData = checkFileExists($employeesJsonFile);

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

function checkFileExists($path) {
    if(file_exists($path)) {
        $jsonData = file_get_contents($path);
        $employeesData = json_decode($jsonData, true);
    }
    return $employeesData;
}

