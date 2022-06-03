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
    

    // var_dump($updateEmployeeId);
    unset($updateEmployeeId['submit']);

    $db = getQueryStringParameters();

    foreach($db as $key => $value){
        

        
        // var_dump($key);
        // var_dump($value);


        if($value['id'] === intval($updateEmployeeId['id'])){
            intval($updateEmployeeId['id']);
            $updatedEmployee = array_replace($db[$key], $updateEmployeeId);
            echo "<pre>";
        // var_dump($db[$key]);
        // var_dump($key);
                // var_dump($value);
                var_dump($updatedEmployee);
        echo "</pre>";
        }
    }

    // $updateEmployee = json_encode($updateEmployee, JSON_PRETTY_PRINT);
    // file_put_contents('../.././resources/employees.json',$db);
    // return $updatedEmployee;
}


// function getEmployee(string $id)
// {
//     // TODO implement it
//     var_dump($id);

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





