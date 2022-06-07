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


function deleteEmployee($dataId)
{
// read json file
    $data = file_get_contents("../../resources/employees.json");

// decode json to associative array
    $jsonArray = json_decode($data, true);
    $indexArray = array();
    
foreach($jsonArray as $key => $value){
    if ($value['id'] == $dataId) {
        unset($jsonArray[$key]);
    }
}
$indexArray = array_values($jsonArray);

// encode array to json and save to file
file_put_contents("../../resources/employees.json", json_encode($indexArray));
return $indexArray;
}


function updateEmployee(array $updateEmployee)
{
    // TODO implement it
}


function getEmployee()
{
    $url = "../../resources/employees.json";
    $employeesData = json_encode(file_get_contents($url), true);
    return $employeesData;
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
