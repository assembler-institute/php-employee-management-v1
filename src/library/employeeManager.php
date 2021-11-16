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
    header("Location: ../dashboard.php");
    return json_encode($newEmployee);
}

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
    echo "<pre>";
    var_dump($encodedData);
    header('Location: ../dashboard.php');
}


#·······································Auxiliar session ·········································
// $id = $_GET['employeeId'];
function getEmployee(string $id)
{

    $json_data = file_get_contents('../resources/employees.json');
    $data = json_decode($json_data, true);
    foreach ($data as $key => $value) {
        if ($value['id'] == $id) {
            return $value;
        }
    };
}
// getEmployee("2");




// function removeAvatar($id)
// {
//     // TODO implement it
// }


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
