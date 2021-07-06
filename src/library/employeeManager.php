<?php

// ! To update the json
// $newJsonString = json_encode($data);
// file_put_contents('jsonFile.json', $newJsonString);

function maxIdInArray($array)
{
    $object = array_reduce($array, function ($a, $b) {
        return $a ? ($a["id"] > $b["id"] ? $a : $b) : $b;
    });
    return $object["id"];
}

function addEmployee(array $newEmployee)
{
    $jsonString = file_get_contents("../../resources/employees.json");
    $employees = json_decode($jsonString, true);
    $newId = 1 + maxIdInArray($employees);
    $newEmployee["id"] = $newId;
    array_push($employees, $newEmployee);
    file_put_contents("../../resources/employees.json", json_encode($employees));
    return $employees;
}


function deleteEmployee(string $id)
{
    // TODO implement it
}


// function updateEmployee(array $updateEmployee)
// {
// // TODO implement it
// }


// function getEmployee(string $id)
// {
// // TODO implement it
// }


// function removeAvatar($id)
// {
// // TODO implement it
// }


// function getQueryStringParameters(): array
// {
// // TODO implement it
// }

// function getNextIdentifier(array $employeesCollection): int
// {
// // TODO implement it
// }
