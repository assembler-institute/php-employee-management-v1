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
    $inp = file_get_contents('../../resources/employees.json');
    $tempArray = json_decode($inp);
    array_push($tempArray, $newEmployee[0]);
    $jsonData = json_encode($tempArray);
    file_put_contents('../../resources/employees.json', $jsonData);
}


function deleteEmployee($id)
{
    $jsonEmployee = file_get_contents('../../resources/employees.json'); //?get JSON content
    $jsonEmployee  = json_decode($jsonEmployee, true); //? decode the JSON into an associative array

    for ($i = 0; $i < count($jsonEmployee); $i++) {
        if ($jsonEmployee[$i]['id'] === $id || $jsonEmployee[$i]['id'] === intval($id)) {
            array_splice($jsonEmployee, $i, 1);
        }
    }
    $jsonData = json_encode($jsonEmployee);
    file_put_contents('../../resources/employees.json', $jsonData);
}

function updateEmployee(array $updateEmployee)
{
    $jsonEmployee = file_get_contents('../../resources/employees.json'); //?get JSON content
    $jsonEmployee  = json_decode($jsonEmployee, true); //? decode the JSON into an associative array
    $id =  $updateEmployee[0]->id;
    print_r($updateEmployee[0]);
    for ($i = 0; $i < count($jsonEmployee); $i++) {
        if ($jsonEmployee[$i]['id'] === $id || $jsonEmployee[$i]['id'] === intval($id)) {
            print_r($jsonEmployee);
            array_splice($jsonEmployee, $i, 0, $updateEmployee[0]);
        }
    }
    $jsonData = json_encode($jsonEmployee);
    file_put_contents('../../resources/employees.json', $jsonData);
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


function getQueryStringParameters() //array
{
    $url = "../src/library/employeeController.php";
    $queryString = parse_url($url, PHP_URL_QUERY);
    var_dump($queryString);
}

function getNextIdentifier($employeesCollection = "") //! input type string?
{
    $jsonEmployee = file_get_contents('../../resources/employees.json'); //?get JSON content
    $jsonEmployee  = json_decode($jsonEmployee, true); //? decode the JSON into an associative array
    $nextId = intval($jsonEmployee[count($jsonEmployee) - 1]['id'] + 1);
    return $nextId;
    /* <!--  <a href="../../resources/employees.json"></a>--> */
}
