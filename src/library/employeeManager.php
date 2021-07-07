<?php


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
    $employeesLength = count($decodedJSON);

    // Template array
    $newEmployeeArray = array(
        "id" => strval($employeesLength + 20),
        "name" => $newEmployee["name"],
        "lastName" => "",
        "email" => $newEmployee["email"],
        "gender" => "?",
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
    echo $updateEmployee;
}


function getEmployee(string $id)
{
    // TODO implement it
    // $_SESSION["employeeID"] = $id;
    // $jsonPath = file_get_contents("../../resources/employees.json");
    // $decodedJSON = json_decode($jsonPath, true);

    // $foundEmployee = array_filter($decodedJSON, function ($employee) {
    //     if ($employee["id"] == $_SESSION["employeeID"]) {
    //         return $employee;
    //     }
    // });

    // $foundEmployeeJSON = json_encode($foundEmployee, true);
    // echo print_r($foundEmployee);
}


function removeAvatar($id)
{
    // TODO implement it
}


function getQueryStringParameters(): array
{
    // TODO implement it
}

function getNextIdentifier(array $employeesCollection): int
{
    // TODO implement it
}
