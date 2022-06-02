<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */


function addEmployee(array $newEmployee){

    $url = 'http://localhost/php-employee-management-v1/resources/employees.json'; 

    $data = json_decode(file_get_contents('../../resources/employees.json'), true);
    var_dump(json_encode($data));
    array_push($data, (object)$newEmployee);
    $the_file = fopen("../../resources/employees.json","wb");
    fwrite($the_file, json_encode($data, JSON_THROW_ON_ERROR));
    fclose($the_file);
    echo json_encode($data) ;
    header("Location: ../dashboard.php");
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
