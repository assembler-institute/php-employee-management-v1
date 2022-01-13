<?php

function addEmployee(array $newEmployee)
{
    $current_data=file_get_contents('../../resources/employees.json');
    $array_data=json_decode($current_data,true);
    $array_data[]=$newEmployee;
    $json = json_encode($array_data, JSON_PRETTY_PRINT);
    file_put_contents('../../resources/employees.json', $json);
}


function deleteEmployee(string $id)
{
    $current_data=file_get_contents('../../resources/employees.json');
    $array_data=json_decode($current_data);
    for($i=0;$i<count($array_data);$i++){
        if($array_data[$i]->id==$id){
            unset($array_data[$i]);
        }
    }
    $json = json_encode($array_data, JSON_PRETTY_PRINT);
    file_put_contents('../../resources/employees.json', $json);

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
/*

function getQueryStringParameters(): array
{
// TODO implement it
}

function getNextIdentifier(array $employeesCollection): int
{
// TODO implement it
}
*/