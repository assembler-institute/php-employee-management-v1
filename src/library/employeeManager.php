<?php

define("EMPLOYEES_JSON_PATH", $_SERVER["DOCUMENT_ROOT"] . "/php-employee-management-v1/resources/employees.json");

getEmployee(1);

function addEmployee(array $newEmployee)
{
    // TODO implement it
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
    $jsonData = file_get_contents(EMPLOYEES_JSON_PATH);
    $employee = json_decode($jsonData, true)[$id];
    return json_encode($employee);
}


function removeAvatar($id)
{
    // TODO implement it
}


function getQueryStringParameters(): array
{
    // TODO implement it
    return  array();
}

function getNextIdentifier(array $employeesCollection): int
{
    // TODO implement it
    return 0;

}
