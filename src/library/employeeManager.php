<?php

define("EMPLOYEES_JSON_PATH", $_SERVER["DOCUMENT_ROOT"] . "/php-employee-management-v1/resources/employees.json");

require('employeeHelper.php');

function addEmployee(array $newEmployee)
{
    $employees = decodeJsonFile(EMPLOYEES_JSON_PATH);
    $newEmployee['id'] = end($employees)['id'] + 1;
    array_push($employees, $newEmployee);

    saveArrayAsJson(EMPLOYEES_JSON_PATH, $employees);
}

function deleteEmployee(string $id)
{
    $employees = decodeJsonFile(EMPLOYEES_JSON_PATH);
    $employee = findItemWithId($employees, $id);

    if ($employee) {
        unset($employees[$employee->key]);
        saveArrayAsJson(EMPLOYEES_JSON_PATH, $employees);

        return true;
    } else {
        return false;
    }
}

function updateEmployee(array $updateEmployee)
{
    $employees = decodeJsonFile(EMPLOYEES_JSON_PATH);
    $employee = findItemWithId($employees, $updateEmployee['id']);

    if ($employee) {
        $employee->value = $updateEmployee;
    } else {
        array_push($employees, $updateEmployee);
    }

    saveArrayAsJson(EMPLOYEES_JSON_PATH, array_sort($employees, 'id'));
}

function getEmployees(array $ids = [])
{
    if (empty($ids)) {
        return file_get_contents(EMPLOYEES_JSON_PATH);
    }

    $employees = decodeJsonFile(EMPLOYEES_JSON_PATH);

    $foundEmployees = array();
    foreach ($ids as $id) {
        $found = findItemWithId($employees, $id);
        if ($found) {
            array_push($foundEmployees, $found->value);
        }
    }

    return encodeJson(array_values($foundEmployees));
}

function getEmployee(string $id)
{
    $employees = decodeJsonFile(EMPLOYEES_JSON_PATH);
    $employee = findItemWithId($employees, $id)->value;

    return encodeJson($employee);
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
