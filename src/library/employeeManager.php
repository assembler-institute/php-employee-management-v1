<?php

// Reads the JSON file and returns and array
function getEmployees() {
    return json_decode(file_get_contents('./../resources/employees.json'), true); // returns an associative array
}

function createEmployee(array $data) {

}

function addEmployee(array $newEmployee)
{
// TODO implement it
}


function deleteEmployee(string $id)
{
// TODO implement it
}


function updateEmployee(array $updateEmployee, string $id)
{
    $employees = getEmployees();
    foreach ($employees as $i => $employee) {
        if ($employee["id"] == $id) {
            $employees[$i] = array_merge($employee, $updateEmployee);
        }
    }
    file_put_contents('./../resources/employees.json', json_encode($employees, JSON_PRETTY_PRINT));
}


function getEmployee(string $id)
{
    $employees = getEmployees();
    foreach ($employees as $employee) {
        if ($employee["id"] == $id) {
            return $employee;
        }
    }
    return null;
}


function removeAvatar($id)
{
// TODO implement it
}


function getQueryStringParameters()
{
// TODO implement it
}

function getNextIdentifier(array $employeesCollection)
{
// TODO implement it
}
