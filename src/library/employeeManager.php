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
    $current_data=file_get_contents('../../resources/employees.json');
    $array_data=json_decode($current_data);
    for($i=0;$i<count($array_data);$i++){
        if($array_data[$i]->id==$updateEmployee["id"]){
            $array_data[$i]->name=$updateEmployee["name"];
            $array_data[$i]->lastName=$updateEmployee["lastName"];
            $array_data[$i]->email=$updateEmployee["email"];
            $array_data[$i]->gender=$updateEmployee["gender"];
            $array_data[$i]->city=$updateEmployee["city"];
            $array_data[$i]->streetAddress=$updateEmployee["streetAddress"];
            $array_data[$i]->state=$updateEmployee["state"];
            $array_data[$i]->age=$updateEmployee["age"];
            $array_data[$i]->postalCode=$updateEmployee["postalCode"];
            $array_data[$i]->phoneNumber=$updateEmployee["phoneNumber"];
        }
    }
    $json = json_encode($array_data, JSON_PRETTY_PRINT);
    file_put_contents('../../resources/employees.json', $json);


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