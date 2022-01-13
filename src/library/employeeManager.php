<?php

// Reads the JSON file and returns and array
function getEmployees() {
    return json_decode(file_get_contents('http://localhost/Assembler/php-employee-management-v1/resources/employees.json'), true); // returns an associative array
}

function addEmployee(array $newEmployee)
{
    $employees = getEmployees();
    array_push($employees,$newEmployee);
    file_put_contents('../../resources/employees.json', json_encode($employees, JSON_PRETTY_PRINT));
}

function deleteEmployee(string $id)
{
    $employees = getEmployees();
    foreach ($employees as $i => $employee){
        if ($employee["id"] == $id){
            unset($employees[$i]);
            $employees = array_values($employees);
        }
    }
    file_put_contents('../../resources/employees.json', json_encode($employees, JSON_PRETTY_PRINT));
}

function updateEmployee(array $updateEmployee, string $id)
{
    $employees = getEmployees();
    foreach ($employees as $i => $employee) {
        if ($employee["id"] == $id) {
            $employees[$i] = array_merge($employee, $updateEmployee);
            echo json_encode($employees[$i]);
        }
    }
    file_put_contents('../../resources/employees.json', json_encode($employees, JSON_PRETTY_PRINT));
}
function updateEmployeeSync(array $updateEmployee, string $id)
{
    $employees = getEmployees();
    foreach ($employees as $i => $employee) {
        if ($employee["id"] == $id) {
            $employees[$i] = array_merge($employee, $updateEmployee);
            echo json_encode($employees[$i]);
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
    $lastId = end($employeesCollection)["id"];
    $lastIdplus1 = intval($lastId)+1;
    return $lastIdplus1;
}