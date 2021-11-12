<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $data)

{
    // TODO implement it
    $json_data = file_get_contents('../../resources/employees.json');
    print_r($json_data);
    $decodedData = json_decode($json_data, true);
    $data['id'] = getNextIdentifier();
    array_push($decodedData, $data);
    $encodedData = json_encode($decodedData);

    if (file_put_contents('../../resources/employees.json', $encodedData)) {
        return true;
    } else {
        return false;
    }
}


function deleteEmployee(string $id)
{
    $json_data = file_get_contents('../../resources/employees.json');
    $data = json_decode($json_data, true);


    foreach ($data as $key => $value) {
        if ($value['id'] == $id) {
            // unset($data[$key]);
            array_splice($data, $key, 1);
        }
    };
    #falta que lo devuelva en formato json
    $encodedData = json_encode($data, true);
    print_r($encodedData);
    if (file_put_contents('../../resources/employees.json', $encodedData)) {
        return true;
    } else {
        return false;
    }
}

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
    print_r($encodedData);

    //hasta aqui funciona
}

// updateEmployee(['id' => '1', 'name' => 'Jose', 'lastName' => 'arboleda', 'email' => 'andres@gmail.com', 'gender' => 'male', 'city' => 'sevilla', 'streetAddress' => '12455', 'state' => 'catalonia', 'age' => '31', 'postalCode' => '08700', 'phoneNumber' => '12345']);


function getEmployee(string $id)
{
    // TODO implement it
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
    $lastId++;
    return $lastId;
}
