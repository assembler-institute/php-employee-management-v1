<?php
//This file will perform the necessary operations (create, read, update and delete) which will be called later by the "employeeController.php" file.

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
    $jsonEmployees = getQueryStringParameters();
    array_push($jsonEmployees, $newEmployee[0]);
    $jsonData = json_encode($jsonEmployees);
    file_put_contents('../../resources/employees.json', $jsonData);
}


function deleteEmployee($id)
{
    $jsonEmployees = getQueryStringParameters();

    for ($i = 0; $i < count($jsonEmployees); $i++) {
        if ($jsonEmployees[$i]['id'] === $id || $jsonEmployees[$i]['id'] === intval($id)) {
            array_splice($jsonEmployees, $i, 1);
        }
    }
    $jsonData = json_encode($jsonEmployees);
    file_put_contents('../../resources/employees.json', $jsonData);
}


function updateEmployee(array $updateEmployee)
{
    $jsonEmployees  = getQueryStringParameters();
    $updateEmployee = json_decode($updateEmployee[0], true);
    $id =  $updateEmployee['id'];

    for ($i = 0; $i < count($jsonEmployees); $i++) {
        if ($jsonEmployees[$i]['id'] === $id || $jsonEmployees[$i]['id'] === intval($id)) {
            $jsonEmployees[$i] = $updateEmployee;
        }
    }
    $jsonData = json_encode($jsonEmployees);
    file_put_contents('../../resources/employees.json', $jsonData);
}


function getEmployee(string $id)
{
    $jsonEmployees  = getQueryStringParameters();

    foreach ($jsonEmployees as $employee) {
        if ($employee['id'] === $id || $employee['id'] === intval($id)) {
            return  $employee;
        }
    }
}


function removeAvatar($id)
{
    // TODO implement it
}


function getQueryStringParameters() //array
{
    $jsonEmployees = file_get_contents('../../resources/employees.json'); //?get JSON content
    $jsonEmployees  = json_decode(($jsonEmployees), true); //? decode the JSON into an associative array
    return $jsonEmployees;
}

function getNextIdentifier($employeesCollection = "") //! input type string?
{
    $jsonEmployee = file_get_contents('../../resources/employees.json'); //?get JSON content
    $jsonEmployee  = json_decode($jsonEmployee, true); //? decode the JSON into an associative array
    $nextId = intval($jsonEmployee[count($jsonEmployee) - 1]['id'] + 1);
    return $nextId;
    /* <!--  <a href="../../resources/employees.json"></a>--> */
}
