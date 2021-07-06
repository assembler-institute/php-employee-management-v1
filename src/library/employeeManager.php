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
    $newEmployee['id'] = generateId($employees);
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


function updateEmployee(array $updateEmployee)
{
    // TODO implement it
}


function getEmployee(string $id)
{

    // TODO implement it

}

function getEmployees()
{
    $employeesJson = file_get_contents('../../resources/employees.json');
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
