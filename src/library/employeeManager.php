<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
    // TODO implement it
}


function deleteEmployee(string $id)
{
    // TODO implement it
}


function updateEmployee(array $updateEmployeeId)
{
    // TODO implement it
    $jsonData = file_get_contents('../../resources/employees.json');  //Aquí al movernos de directorio tenemos que tener cuidado
    $data = json_decode($jsonData, true);

    foreach ($data as $key => $employee) {
        if (intval($updateEmployeeId['id']) === $employee['id']) {
            $employee['name'] = $updateEmployeeId['name'];
            $employee['lastName'] = $updateEmployeeId['lastName'];
            $employee['gender'] = $updateEmployeeId['gender'];
            $employee['streetAddress'] = $updateEmployeeId['streetAddress'];
            $employee['age'] = $updateEmployeeId['age'];
            $employee['email'] = $updateEmployeeId['email'];
            $employee['city'] = $updateEmployeeId['city'];
            $employee['state'] = $updateEmployeeId['state'];
            $employee['postalCode'] = $updateEmployeeId['postalCode'];
            $employee['phoneNumber'] = $updateEmployeeId['phoneNumber'];
        }
    }
    
    $newJsonString = json_encode($data);
    file_put_contents('../../resources/employees.json', $newJsonString);

    header('location: ../.././index.php');
}

function getEmployee(string $id)
{
    // TODO implement it

    $jsonData = file_get_contents('../resources/employees.json');
    $data = json_decode($jsonData, true);

    foreach ($data as $key => $employee) {
        if ($employee['id'] == $id) {
            return $employee;
        }
    }
}


// function removeAvatar($id)
// {
// // TODO implement it
// }


// function getQueryStringParameters(): array
// {
// // TODO implement it
// }

// function getNextIdentifier(array $employeesCollection): int
// {
// // TODO implement it
// }
