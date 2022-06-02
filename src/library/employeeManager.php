<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */


function addEmployee(array $newEmployee)
{
    $url = '../../resources/employees.json';

    //Create new cURL resource
    $ch = curl_init($url);

    //setup request to send json via POST
    $payload = json_encode($newEmployee);

    //attach encoded JSON string to the POST fields
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    //set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    //return response instead of outputting
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute the POST request
    $result = curl_exec($ch);

    //close cURL resource
    curl_close($ch);
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
    $data = json_decode(file_get_contents('../../resources/employees.json'), true);
    echo json_encode($data);

}



function getNextIdentifier(array $employeesCollection): int
{
// TODO implement it
}
