<?php
session_start();

function getAllEmployees()
{
    $jsonPath = file_get_contents("../../resources/employees.json");
    $decodedJSON = json_decode($jsonPath, true);
    echo json_encode($decodedJSON);
}

function addEmployee(array $newEmployee)
{
    $jsonPath = file_get_contents("../../resources/employees.json");
    $decodedJSON = json_decode($jsonPath, true);

    if (!isset($_SESSION["newEmployeeId"])) {

        $idArray = array();
        foreach ($decodedJSON as $employee) {
            $idArray[] = $employee["id"];
        }

        echo print_r($idArray, true);
        asort($idArray);
        $maxId = end($idArray);

        $_SESSION["newEmployeeId"] = $maxId + 1;
    } else {
        $_SESSION["newEmployeeId"]++;
    }

    // If user is created from dashboard
    if (!isset($newEmployee["lastName"])) {
        $newEmployee += ["lastName" => ""];
        $newEmployee += ["gender" => ""];
    }

    // Template array
    $newEmployeeArray = array(
        "id" => strval($_SESSION["newEmployeeId"]),
        "name" => $newEmployee["name"],
        "lastName" =>  $newEmployee["lastName"],
        "email" => $newEmployee["email"],
        "gender" =>  $newEmployee["gender"],
        "city" => $newEmployee["city"],
        "streetAddress" => $newEmployee["streetAddress"],
        "state" => $newEmployee["state"],
        "age" => intval($newEmployee["age"]),
        "postalCode" => $newEmployee["postalCode"],
        "phoneNumber" => $newEmployee["phoneNumber"]
    );

    array_push($decodedJSON, $newEmployeeArray);
    file_put_contents("../../resources/employees.json", json_encode($decodedJSON));
}


function deleteEmployee(string $id)
{
    $jsonPath = file_get_contents("../../resources/employees.json");
    $decodedJSON = json_decode($jsonPath, true);

    $updatedArray = array();
    foreach ($decodedJSON as $index => $employee) {
        if ($employee["id"] == $id) {
            unset($decodedJSON[$index]);
        } else {
            array_push($updatedArray, $employee);
        }
    }

    file_put_contents("../../resources/employees.json", json_encode($updatedArray));
}


function updateEmployee(array $updateEmployee)
{
    $jsonPath = file_get_contents("../../resources/employees.json");
    $decodedJSON = json_decode($jsonPath, true);

    $id = $_SESSION["employeeId"];
    $updateEmployee["id"] = strval($id);
    foreach ($decodedJSON as $employee) {
        if ($employee["id"] == $id) {
            $pos = array_search($employee, $decodedJSON);
            unset($decodedJSON[$pos]);
            $decodedJSON[$pos] = $updateEmployee;
            asort($decodedJSON);
        }
    }

    echo print_r($decodedJSON);
    file_put_contents("../../resources/employees.json", json_encode($decodedJSON));
}


function getEmployee(string $id)
{
    $jsonPath = file_get_contents("../../resources/employees.json");
    $decodedJSON = json_decode($jsonPath, true);
    foreach ($decodedJSON as $employee) {
        if ($employee["id"] == $id) {
            $_SESSION["employeeToUpdate"] = $employee;
            $_SESSION["employeeId"] = $id;
        }
    }
}
