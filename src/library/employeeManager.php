<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */


#·······································add session ·········································
function addEmployee(array $newEmployee)
{
    $jsonString = file_get_contents("../../resources/employees.json");
    $employees = json_decode($jsonString, true);
    $newId =  1 + getNextIdentifier();
    $newEmployee["id"] = $newId;
    array_push($employees, $newEmployee);
    file_put_contents("../../resources/employees.json", json_encode($employees));
    http_response_code(201);
    return json_encode($newEmployee);
}
// function addEmployee(array $data)

// {
//     // TODO implement it
//     $json_data = file_get_contents('../../resources/employees.json');
//     $decodedData = json_decode($json_data, true);
//     $data['id'] = 1 + getNextIdentifier();
//     array_push($decodedData, $data);
//     $encodedData = json_encode($decodedData);

//     if (file_put_contents('../../resources/employees.json', $encodedData)) {
//         return true;
//     } else {
//         return false;
//     }
// }

#·······································Delete session ·········································

function deleteEmployee(string $id)
{
    $json_data = file_get_contents('../../resources/employees.json');
    $data = json_decode($json_data, true);


    foreach ($data as $key => $value) {
        if ($value['id'] == $id) {
            array_splice($data, $key, 1);
        }
    };
    $encodedData = json_encode($data, true);
    print_r($encodedData);
    if (file_put_contents('../../resources/employees.json', $encodedData)) {
        return true;
    } else {
        return false;
    }
}

#·······································Update session ·········································

$updateEmployee = ['id' => '12', 'name' => 'Jose', 'lastName' => 'arboleda', 'email' => 'andres@gmail.com', 'gender' => 'male', 'city' => 'sevilla', 'streetAddress' => '12455', 'state' => 'catalonia', 'age' => '31', 'postalCode' => '08700', 'phoneNumber' => '12345'];

function updateEmployee(array $updateEmployee)
{
    // TODO implement it
    $json_data = file_get_contents('../../resources/employees.json');
    $data = json_decode($json_data, true);
    foreach ($data as $key => $value) {
        if ($value['id'] == $updateEmployee['id']) {
            $data[$key] = $updateEmployee;
        }
    };
    $encodedData = json_encode($data, true);
    file_put_contents('../../resources/employees.json', $encodedData);
    print_r($encodedData);
}

updateEmployee($updatedEmployee);

#·······································Auxiliar session ·········································

function getEmployee(string $id)
{
    // TODO implement it
    if (isset($_POST['id'])) {
    }
}


function removeAvatar($id)
{
    // TODO implement it
}


// function getQueryStringParameters(): array
// {
// // TODO implement it
// }

function getNextIdentifier(): int
{
    $json_data = file_get_contents('../../resources/employees.json');
    $data = json_decode($json_data, true);
    $lastId = end($data);
    $lastId = $lastId['id'];
    return $lastId;
}
