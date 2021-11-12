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
    echo "addEmployee";
    $jsonBdd = "../../resources/employees.json";
    $fh = fopen($jsonBdd, 'w') or die("can't open file");
    $stringData = json_encode($newEmployee);
    fwrite($fh, $stringData);
    fclose($fh);
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
    $jsonEmployee = file_get_contents('../../resources/employees.json'); //?get JSON content
    $jsonEmployee  = json_decode($jsonEmployee, true); //? decode the JSON into an associative array

    foreach ($jsonEmployee as $employee) {
        if ($employee['id'] === $id || $employee['id'] === intval($id)) {
            return  $employee;
        }
    }
}


function removeAvatar($id)
{
    // TODO implement it
}


//function getQueryStringParameters(): array
{
    // TODO implement it
}

function getNextIdentifier($employeesCollection = "") //! input type string?
{
    $jsonEmployee = file_get_contents('../../resources/employees.json'); //?get JSON content
    $jsonEmployee  = json_decode($jsonEmployee, true); //? decode the JSON into an associative array
    $nextId = $jsonEmployee[count($jsonEmployee) - 1]['id'] + 1;
    return $nextId;
    /* <!--  <a href="../../resources/employees.json"></a>--> */
}
