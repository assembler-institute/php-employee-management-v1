<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
   
   unset($newEmployee['submit']);
   $newEmployee['id'] = hexdec(uniqid());
   

   $db = getQueryStringParameters();
   array_push($db, $newEmployee); 
   $db = json_encode($db);
   file_put_contents('../.././resources/employees.json', $db);
   
}



function deleteEmployee($id)
{
    $db = getQueryStringParameters();
    $modifiedDb = array();
    foreach($db as $key => $value) {
        if($value['id'] === $id) {
            unset($db[$key]);
        }
    }
    $modifiedDb = array_values($db);
    $modifiedDb = json_encode($modifiedDb, JSON_PRETTY_PRINT);
    file_put_contents('../.././resources/employees.json',$modifiedDb);
    return $modifiedDb;
}



function updateEmployee(array $updateEmployeeId)
{
    // TODO implement it
    var_dump($updateEmployeeId);
    var_dump($_POST);
}


// function getEmployee(string $id)
// {
//     // TODO implement it
    
//     echo $id;

// }


// function removeAvatar($id)
// {
// // TODO implement it
// }


function getQueryStringParameters(): array
{
    $json = file_get_contents('../.././resources/employees.json');
    $data = json_decode($json,true);
    return $data;
}

// function getNextIdentifier(array $employeesCollection): int
// {
// // TODO implement it
// }





