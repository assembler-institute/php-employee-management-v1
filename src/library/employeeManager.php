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

function addNewEmployee($createdEmployee){

    $employeesJson = file_get_contents('../../resources/employees.json');
    $employeesDecodedJson = json_decode($employeesJson, true);
    $createdEmployee["id"] = end($employeesDecodedJson)["id"] + 1;
    array_push($employeesDecodedJson, $createdEmployee);
    $employeeEncodedJson = json_encode($employeesDecodedJson);
    file_put_contents("../../resources/employees.json", $employeeEncodedJson);

    return $employeeEncodedJson;
    

    // $employeeEmail = $_POST["employee-email"];

    // $createdEmployee = array(
    //     "age" => $_POST["employee-age"], // es el name del input.
    //     "city" => $_POST["employee-city"],
    //     "email" => $_POST["employee-email"],
    //     "gender" => $_POST["employee-gender"],
    //     "id" => $_POST["employee-id"],
    //     "lastName" => $_POST["employee-gender"],
    //     "name" => $_POST["employee-name"],
    //     "phoneNumber" => $_POST["employee-phone-number"],
    //     "postalCode" => $_POST["employee-postal-code"],
    //     "state" => $_POST["employee-state"],
    //     "streetAddress" => $_POST["employee-street-address"]
    // );

    // return json_encode($createdEmployee);
    // return json_encode("Employee email: " . $employeeEmail); //enviar respuesta en formato json.
}







// function addEmployee(array $createdEmployee){

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
