<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee()
{
// TODO implement it (array $newEmployee)
    $file = "./../resources/employees.json";
    $Allusers = file_get_contents($file);
    $usersAll = json_decode($Allusers);
    $myJson = array(
        'name          '   =>   $_POST['name'],
        'lastName      '   =>  $_POST['lastName'],
        '$email        '   =>  $_POST['email'],
        '$gender       '   =>   $_POST['gender'],
        '$age          '   =>  $_POST['age'],
        '$streetAddress'   =>   $_POST['streetAddress'],
        '$city         '   =>  $_POST['city'],
        '$state        '   =>  $_POST['state'],
        '$postalCode   '   =>   $_POST['postalCode'],
        '$phoneNumber  '   =>  $_POST['phoneNumber']
    );


    array_push($usersAll, $myJson);
    $otra = json_encode($usersAll);
    file_put_contents($file, $otra);

};


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
