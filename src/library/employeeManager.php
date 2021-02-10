<?php

define("EMPLOYEES_JSON_PATH", $_SERVER["DOCUMENT_ROOT"] . "/php-employee-management-v1/resources/employees.json");

function addEmployee(array $newEmployee)
{
    $employees = json_decode(file_get_contents(EMPLOYEES_JSON_PATH), true);
    $newEmployee['id'] = end($employees)['id'] + 1;
    array_push($employees, $newEmployee);
    $fileData = json_encode(array_values($employees), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents(EMPLOYEES_JSON_PATH, $fileData);
}

function deleteEmployee(string $id)
{
    $employees = json_decode(file_get_contents(EMPLOYEES_JSON_PATH), true);
    foreach ($employees as $i => $employee) {
        if ($employee['id'] == $id) {
            unset($employees[$i]);
            $fileData = json_encode(array_values($employees), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            file_put_contents(EMPLOYEES_JSON_PATH, $fileData);
            break;
        }
    }
}


function updateEmployee(array $updateEmployee)
{
    $employees = json_decode(file_get_contents(EMPLOYEES_JSON_PATH), true);
    $employeeExists = false;
    foreach ($employees as &$employee) {
        if ($employee['id'] == $updateEmployee['id']) {
            $employeeExists = true;
            $employee = $updateEmployee;
            break;
        }
    }
    if (!$employeeExists) {
        array_push($employees, $updateEmployee);
    }
    $fileData = json_encode(array_values($employees), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents(EMPLOYEES_JSON_PATH, $fileData);
}


function getEmployee(string $id)
{
    $employees = json_decode(file_get_contents(EMPLOYEES_JSON_PATH), true);
    foreach ($employees as $i => $employee) {
        if ($employee['id'] == $id) {
            return json_encode($employees[$i], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
        }
    }
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
