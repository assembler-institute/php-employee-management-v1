<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

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
    // TODO implement it
    if(file_exists($employeesJsonFile)) {
        // If employees database exist, load all employees
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


function getQueryStringParameters(): array
{
// TODO implement it
}

function getNextIdentifier(array $employeesCollection): int
{
// TODO implement it
}
