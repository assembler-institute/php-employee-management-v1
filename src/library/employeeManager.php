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


// function employeeDashboard() {
//     $employeesJson = file_get_contents('../resources/employees.json');
//     $employeesDecodedJson = json_decode($employeesJson, true); // convert a json string to an array.
//     #echo json_encode($employeesDecodedJson);

//     foreach ($employeesDecodedJson as $employee) {
//         $employeeId = $employee["id"];
//         $employeeName = $employee["name"];
//         $employeeEmail = $employee["email"];
//         $employeeAge = $employee["age"];
//         $employeeStreetAdress = $employee["streetAddress"];
//         $employeeCity = $employee["city"];
//         $employeeState = $employee["state"];
//         $employeePostalCode = $employee["postalCode"];
//         $employeePhoneNumber = $employee["phoneNumber"];
//     }
// } 



// function addEmployee(array $newEmployee){

//     $employeesJson = file_get_contents('../../resources/employees.json');
//     $employeesDecodedJson = json_decode($employeesJson, true);

//     jsonData json_encode($employeesDecodedJson);
//     file_put_contents('../../resources/employees.json', jsonData);
//     include("../../assets/js/prueba.js")
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
