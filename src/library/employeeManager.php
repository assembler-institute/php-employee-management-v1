<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $data)

{
    // TODO implement it
    $json_data = file_get_contents('../../resources/employees.json');
    $decodedData = json_decode($json_data, true);
    var_dump($json_data, $decodedData);
    array_push($decodedData, $data);
    $encodedData = json_encode($decodedData);
    # falta añadir el $id=encode_data 
    // $encodecData['id'] = getMeNyNEwID();
    if (file_put_contents('../../resources/employees.json', $encodedData)) {
        return true;
    } else {
        return false;
    }
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


// function getQueryStringParameters(): array
// {
// // TODO implement it
// }

// function getNextIdentifier(array $employeesCollection): int
// {
// // TODO implement it

// }
