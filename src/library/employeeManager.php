<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee($newEmployee)
{
// TODO implement it
header("Location: ../dashboard.php");
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
}

function getNextIdentifier(array $employeesCollection): int
{
// TODO implement it
}
function getEmployeesData(){
    //Read json data
    $storedEmployes = "../../resources/employees.json";
    //Decode Json data
    $stored_employees = json_decode(file_get_contents($storedEmployes), true);
    return $stored_employees;
}
