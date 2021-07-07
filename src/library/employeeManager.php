<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
    $employees = getEmployees();
    $newEmployee = array_merge(['id' => generateId($employees)], $newEmployee);
    // $newEmployee['id'] = generateId($employees);
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
    file_put_contents(
        "../../resources/employees.json",
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


function getEmployeeById(string $id)
{
    // TODO implement it
    $employees = getEmployees();
    foreach ($employees as $employee) {
        if ($employees['id'] == $id) return $employee;
    }
    return null;
}

function getEmployees()
{
    $employeesJson = file_get_contents('/Applications/MAMP/htdocs/php-employee-management-v1/resources/employees.json');
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
