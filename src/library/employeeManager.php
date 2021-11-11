<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

 //require_once './employeeController.php';

function addEmployee(array $newEmployee)
{
// TODO implement it
    $employeesCollection = json_decode(file_get_contents('../../resources/employees.json'),true); //convierte a varible de php (array)
    $newEmployee['id'] = getNextIdentifier($employeesCollection);
    array_push($employeesCollection,$newEmployee);

    file_put_contents('../../resources/employees.json',json_encode($employeesCollection));
    return true;
     

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
// TODO implement it
     return count($employeesCollection) + 1;
}
