<?php

function addEmployee()//array $newEmployee
{
    // TODO implement it
    echo "add";
}


function deleteEmployee()//string $id
{
    // TODO implement it
    echo "delete";
}


function updateEmployee()//array $updateEmployee
{
    // TODO implement it
    echo "update";
}


function getEmployees()
{
    $decode_json = json_decode(file_get_contents("../../resources/employees.json"));
    $employees_array = [];
    foreach($decode_json as $employee){
        array_push($employees_array, json_decode(json_encode($employee), true));
    };
    print_r(json_encode($employees_array));
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
