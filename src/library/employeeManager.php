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
    $url = '../../resources/employees.json'; // path to your JSON file
    $data = file_get_contents($url); // put the contents of the file into a variable
    $employees = json_decode($data, true); // decode the JSON to key value array
    print_r($employees[$updateEmployee['id'] - 1]);
    echo "<br>";
    print_r($updateEmployee);
    echo "<br>";
    print_r(array_replace($employees[$updateEmployee['id'] - 1],$updateEmployee));

}


function getEmployee(string $id)
{
    $url = '../resources/employees.json'; // path to your JSON file
    $data = file_get_contents($url); // put the contents of the file into a variable
    $employees = json_decode($data, true); // decode the JSON to key value array

    foreach ($employees as $employee) {
        if($employee['id'] == $id){
            return $employee;
        }
    }
}


function removeAvatar($id)
{
// TODO implement it
}


function getQueryStringParameters()
{
// TODO implement it
}

function getNextIdentifier(array $employeesCollection)
{
// TODO implement it
}
