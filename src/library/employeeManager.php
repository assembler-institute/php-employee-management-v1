<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
    $employeesCollection = json_decode(file_get_contents('../../resources/employees.json'), true); //convierte a varible de php (array)
    $newEmployee['id'] = getNextIdentifier($employeesCollection);
    if (!isset($newEmployee['gender'])) {
        $newEmployee['gender'] = "";
    }
    if (!isset($newEmployee['lastName'])) {
        $newEmployee['lastName'] = "";
    }

    array_push($employeesCollection, $newEmployee);

    file_put_contents('../../resources/employees.json', json_encode($employeesCollection));
    return true;

}

function deleteEmployee(string $id)
{
    $employeesCollection = json_decode(file_get_contents('../../resources/employees.json'), true); //convierte a varible de php (array)
    foreach ($employeesCollection as $index => $employee) {
        if ($employee['id'] == $id) {
            unset($employeesCollection[$index]);
        }
    }

    file_put_contents('../../resources/employees.json', json_encode($employeesCollection));
    return true;
}

function updateEmployee(array $updateEmployee)
{
    $employeesCollection = json_decode(file_get_contents('../../resources/employees.json'), true); //convierte a varible de php (array)
    
    foreach ($employeesCollection as $index => $employee) {
        if ($employee['id'] == $updateEmployee['id']) {
            $employeesCollection[$index] = $updateEmployee;
        }
    }

    file_put_contents('../../resources/employees.json', json_encode($employeesCollection));
    return true;
}

function getEmployee(string $id)
{
// TODO implement it
}

function removeAvatar($id)
{
// TODO implement it
}

function getQueryStringParameters(): array
{
// TODO implement it

    return [];
}

function getNextIdentifier(array $employeesCollection): int
{
    return count($employeesCollection) + 1;
}
