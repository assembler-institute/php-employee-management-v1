<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function getEmployeers(): array {
    try {
        $fileName = ".././../resources/employees.json";
        if (!file_exists($fileName)) throw new Exception('File open failed');
        $content = file_get_contents($fileName);
        return json_decode($content, TRUE);
    } catch (Throwable $t) {
        // echo $t->getMessage();
    }
}

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


function getQueryStringParameters(): array
{
// TODO implement it
}

function getNextIdentifier(array $employeesCollection): int
{
// TODO implement it
}
