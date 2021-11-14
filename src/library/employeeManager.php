<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
    echo json_encode($newEmployee);
    // var_dump($newEmployee);
    // $jsonString = file_get_contents("../../resources/employees.json");
    // $employees = json_decode($jsonString, true);
    // $newId = 10;
    // $newEmployee["id"] = $newId;
    // array_push($employees, $newEmployee);
    // file_put_contents("../../resources/employees.json", json_encode($employees));
    // print_r(file_put_contents("../../resources/employees.json", json_encode($employees)));
    // http_response_code(201);
    // print_r(json_encode($newEmployee));
}

die();
// echo __DIR__ . "/resources/employees.json";

// // TODO implement it
// $json_data = file_get_contents('../../resources/employees.json');
// echo "<pre>";
// var_dump($json_data);
// echo "<pre>";

// $decodedData = json_decode($json_data, true);
// $newid = 10;
// // getNextIdentifier();
// $data['id'] = $newid;
// array_push($decodedData, $newid);
// $encodedData = json_encode($decodedData);
// echo "<pre>";
// print_r($encodedData);
// echo "<pre>";

// var_dump(file_put_contents('../../resources/employees.json', $encodedData));

// if (file_put_contents('../../resources/employees.json', $encodedData)) {
//     echo  "true";
// } else {
//     echo "false";
// }
die();
// }
// addEmployee($data);
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
    // print_r($encodedData);
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
    // print_r($encodedData);

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
    $lastId + 1;
    return $lastId;
}
