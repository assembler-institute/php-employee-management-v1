<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
    $jsonData = file_get_contents('../../resources/employees.json');
    $usersData = json_decode($jsonData, true);

    $newEmployeeWithNumbers = strToNumber($newEmployee);

    $foundEmployee = false;
    foreach ($usersData as $user) {
        if ($user["id"] == $newEmployeeWithNumbers["id"]) {
            $foundEmployee = true;
            array_splice($usersData, array_search($user, $usersData), 1, [$newEmployeeWithNumbers]);
        }
    }
    if ($foundEmployee === false) {
        $usersData[] = $newEmployeeWithNumbers;
    }

    $jsonData = json_encode($usersData, JSON_PRETTY_PRINT);

    file_put_contents('../../resources/employees.json', $jsonData);
}


function deleteEmployee(string $id)
{
    if (file_exists('../../resources/employees.json')) {
        $jsonData = file_get_contents('../../resources/employees.json');
        $usersData = json_decode($jsonData, true);
    } else {
        $usersData = [];
    }
    foreach ($usersData as $user) {
        if ($user["id"] == $id) {
            array_splice($usersData, array_search($user, $usersData), 1);
        }
    }
    $jsonData = json_encode($usersData, JSON_PRETTY_PRINT);
    file_put_contents('../../resources/employees.json', $jsonData);
}


function updateEmployee(array $updateEmployee)
{
    $jsonData = file_get_contents('../../resources/employees.json');
    $usersData = json_decode($jsonData, true);
    foreach ($usersData as $user) {
        if ($user["id"] == $updateEmployee["id"]) {
            $updateEmployee = strToNumber($updateEmployee);
            array_splice($usersData, array_search($user, $usersData), 1, [$updateEmployee]);
        }
    }
    $jsonData = json_encode($usersData, JSON_PRETTY_PRINT);
    file_put_contents('../../resources/employees.json', $jsonData);
}


function getEmployee(string $id)
{
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

function strToNumber(array $employee)
{
    $employee["id"] = intval($employee["id"]);
    $employee["age"] = intval($employee["age"]);
    $employee["streetAddress"] = intval($employee["streetAddress"]);
    $employee["postalCode"] = intval($employee["postalCode"]);
    $employee["phoneNumber"] = intval($employee["phoneNumber"]);

    return $employee;
}
