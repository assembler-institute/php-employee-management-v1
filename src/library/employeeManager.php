<?php

define("EMPLOYEES_JSON_PATH", $_SERVER["DOCUMENT_ROOT"] . "/php-employee-management-v1/resources/employees.json");

require_once('helper.php');
require_once('avatarManager.php');

function addEmployee(array $newEmployee)
{
    $employees = decodeJsonFile(EMPLOYEES_JSON_PATH);
    $newEmployee['id'] = end($employees)['id'] + 1;
    array_push($employees, $newEmployee);

    saveArrayAsJson(EMPLOYEES_JSON_PATH, $employees);
}

function deleteEmployee(int $id)
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
        $employees = decodeJsonFile(EMPLOYEES_JSON_PATH);
        $allEmployees = array();
        foreach($employees as $employee) {
            $avatar = json_decode(getAvatar($employee['id']), true);
            $employee['avatar'] = $avatar;
            array_push($allEmployees, $employee);
        }
        return encodeJson(array_values($allEmployees));
    }
 
    $employees = decodeJsonFile(EMPLOYEES_JSON_PATH);

    $foundEmployees = array();
    foreach ($ids as $id) {
        $avatar = json_decode(getAvatar($id), true);
        $found = findItemWithId($employees, $id);
        if ($found) {
            $found->value['avatar'] = $avatar;
            array_push($foundEmployees, $found->value);
        }
    }

    return encodeJson(array_values($foundEmployees));
}

function getEmployee(int $id)
{
    $employees = decodeJsonFile(EMPLOYEES_JSON_PATH);
    $found = findItemWithId($employees, $id);
    
    $employee = $found ? $found->value : array();

    return encodeJson($employee);
}

function getEmployeeAsArray(int $id)
{
    $employees = decodeJsonFile(EMPLOYEES_JSON_PATH);
    $found = findItemWithId($employees, $id);
    $employee = $found ? $found->value : array();
    return $employee;
}

