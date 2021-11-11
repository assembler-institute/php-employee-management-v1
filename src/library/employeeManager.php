<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
    if (file_exists('../../resources/employees.json')) {
        $jsonData = file_get_contents('../../resources/employees.json');
        $usersData = json_decode($jsonData, true);
    } else {
        $usersData = [];
    }
    $usersData[] = $newEmployee;
    $jsonData = json_encode($usersData, JSON_PRETTY_PRINT);

    file_put_contents('../../resources/employees.json', $jsonData);
}


function deleteEmployee(string $id)
{
    // TODO implement it
}


function updateEmployee(array $updateEmployee)
{
    // TODO implement it
}


function getEmployee(string $id)
{
    // TODO implement it
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
