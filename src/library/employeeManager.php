<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */


// session_start();

function loadAllEmployees(){
    $employeesJson = file_get_contents('../../resources/employees.json');
    return $employeesJson;
}

function addNewEmployee($createdEmployee){ //function addEmployee(array $createdEmployee)
    
    $employeesJson = file_get_contents('../../resources/employees.json');
    $employeesDecodedJson = json_decode($employeesJson, true);

    $createdEmployee["id"] = end($employeesDecodedJson)["id"] + 1;

    array_push($employeesDecodedJson, $createdEmployee);

    $employeeEncodedJson = json_encode($employeesDecodedJson);
    file_put_contents("../../resources/employees.json", $employeeEncodedJson);

    echo $employeeEncodedJson;
    
    // $employeeEmail = $_POST["employee-email"];
    // return json_encode("Employee email: " . $employeeEmail); //enviar respuesta en formato json.
}

// foreach ($employeesDecodedJson as $employee) {
    //     $employeeName = $employee["name"];
    //     $employeeLastName = $employee["lastName"];
    //     $employeeEmail = $employee["email"];
    // }

    // if ($createdEmployee["email"] != $employeeEmail {
        // if ($createdEmployee["name"] != $employeeName && $createdEmployee["lastName"] != $employeeLastName){

        // }
    // }


// function deleteEmployee(string $id)
// {
// // TODO implement it
// }


// function updateEmployee(array $updateEmployee)
// {
// // TODO implement it
// }


// function getEmployee(string $id)
// {
// // TODO implement it
// }


// // function removeAvatar($id)
// // {
// // // TODO implement it
// // }


// function getQueryStringParameters(): array
// {
// // TODO implement it
// }

// function getNextIdentifier(array $employeesCollection): int
// {
// // TODO implement it
// }
