<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
// TODO implement it
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


function getQueryStringParameters()
{
// TODO implement it array
}

function getNextIdentifier(array $employeesCollection)
{
// TODO implement it int
}
function leerempleados(){
    $file=".././../resources/employees.json";
    $Allusers= file_get_contents($file);
    $usersAll=json_decode($Allusers);
    return $usersAll;
}