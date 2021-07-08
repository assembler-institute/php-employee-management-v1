<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: 
 * @date: 07/07/2021
 */

function addEmployee(array $newEmployee)
{
    $employees = getEmployees();
    $newEmployee = array_merge($newEmployee, ["id" => generateId($employees)]);
    $employees[] = $newEmployee;
    saveDataToJson($employees);
    return $newEmployee;
}


function deleteEmployee(string $id)
{
    $employees = getEmployees();
    foreach ($employees as $index => $employee) {
        if ($employee['id'] == $id) {
            // unset($employees[$index]);
            array_splice($employees, $index, 1);
        }
    }
    saveDataToJson($employees);
}

function saveDataToJson($data)
{
    $dir = dirname(__DIR__, 2);
    file_put_contents(
        $dir . "/resources/employees.json",
        json_encode($data, JSON_PRETTY_PRINT)
    );
}


function updateEmployee($id, $data)
{
    $employees = getEmployees();
    foreach ($employees as $index => $employee) {
        if ($employee['id'] == $id) {
            $updatedEmployee = array_merge($employee, $data);
            $employees[$index] = $updatedEmployee;

            saveDataToJson($employees);
            return true;
        }
    }
}


function getEmployeeById($id)
{
    $employees = getEmployees();
    foreach ($employees as $employee) {
        if ($employee['id'] == $id) return $employee;
    }
    return null;
}

function getEmployees()
{
    $dir = dirname(__DIR__, 2);
    $employeesJson = file_get_contents($dir . '/resources/employees.json');
    return json_decode($employeesJson, true);
}

function removeAvatar($id)
{
    // TODO implement it
}

function generateId($arr)
{
    for ($i = 1; $i < 3000; $i++) {
        $searchedValue = false;
        foreach ($arr as $item) {
            if ($i == intval($item['id'])) {
                $searchedValue = true;
                break;
            }
        }

        if (!$searchedValue) return $i;
    }
}


// function getQueryStringParameters(): array
// {
//     // TODO implement it
// }

// function getNextIdentifier(array $employeesCollection): int
// {
//     // TODO implement it
// }
