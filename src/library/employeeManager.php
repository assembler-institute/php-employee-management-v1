<?php

function addEmployee(array $newEmployee)
{
    $jsonPath = file_get_contents("../../resources/employees.json");
    $decodedJSON = json_decode($jsonPath, true);
    $employeesLength = count($decodedJSON);

    // Template array
    $newEmployeeArray = array(
        "id" => "$employeesLength" + 20,
        "name" => $newEmployee["name"],
        "lastName" => "",
        "email" => $newEmployee["email"],
        "gender" => "?",
        "city" => $newEmployee["city"],
        "streetAddress" => $newEmployee["streetAddress"],
        "state" => $newEmployee["state"],
        "age" => $newEmployee["age"],
        "postalCode" => $newEmployee["postalCode"],
        "phoneNumber" => $newEmployee["phoneNumber"]
    );

    array_push(
        $decodedJSON,
        $newEmployeeArray
    );

    file_put_contents("../../resources/employees.json", json_encode($decodedJSON));
}


function deleteEmployee(string $id)
{
    $jsonPath = file_get_contents("../../resources/employees.json");
    $decodedJSON = json_decode($jsonPath, true);

    $index = 0;
    foreach ($decodedJSON as $employee) {
        if ($employee["id"] == $id) {
            // echo print_r($decodedJSON[$index]);
            unset($decodedJSON[$index]);
            break;
        } else {
            $index++;
        }
    }

    file_put_contents("../../resources/employees.json", json_encode($decodedJSON));
    echo json_encode($decodedJSON);
}

deleteEmployee("3");

function updateEmployee(array $updateEmployee)
{
    // TODO implement it
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
