<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */
    // if(isset($_POST['data'])) {
    //     $currentData = file_get_contents('../../resources/employees.json');
    //     //echo "'<script>console.log(".$currentData.")</script>'";
    //     echo $currentData;
    // }



function getEmployeesData() {
    $json_data = file_get_contents('../../resources/employees.json');
    return $json_data;
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
