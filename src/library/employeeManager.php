<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
    $employeesCollection = json_decode(file_get_contents('../../resources/employees.json'), true); //convierte a varible de php (array)
    $newEmployee['id'] = getNextIdentifier($employeesCollection);
    $newEmployee['age'] = intval($newEmployee['age']);

    if (!isset($newEmployee['gender'])) {
        $newEmployee['gender'] = "";
    }
    if (!isset($newEmployee['lastName'])) {
        $newEmployee['lastName'] = "";
    }

    array_push($employeesCollection, $newEmployee);

    file_put_contents('../../resources/employees.json', json_encode($employeesCollection, JSON_PRETTY_PRINT));

    if (isset($_POST['lastName'])) {

        session_start();
        $_SESSION['notification'] = "Inserted Succesful!";
        header('Location: ../dashboard.php');
    } else {
        return $newEmployee['id'];
    }
}

function deleteEmployee(string $id)
{
    $employeesCollection = json_decode(file_get_contents('../../resources/employees.json'), true); //convierte a varible de php (array)
    // var_dump($employeesCollection);

    for ($i = 0; $i < count($employeesCollection); $i++) {
        if ($employeesCollection[$i]['id'] == $id) {
            // echo $i;
            array_splice($employeesCollection, $i, 1);
        } else {
            echo "not";
        }
    }

    file_put_contents('../../resources/employees.json', json_encode($employeesCollection, JSON_PRETTY_PRINT));
    return true;
}

function updateEmployee(array $updateEmployee)
{
    $employeesCollection = json_decode(file_get_contents('../../resources/employees.json'), true); //convierte a varible de php (array)

    foreach ($employeesCollection as $index => $employee) {

        if ($employee['id'] == $updateEmployee['id']) {
            $employeesCollection[$index] = $updateEmployee;
        }
    }
    file_put_contents('../../resources/employees.json', json_encode($employeesCollection, JSON_PRETTY_PRINT));
    if (isset($_GET["form"])) {
        header('Location: ../dashboard.php');
    }
    return true;
}

function getEmployee(string $id)
{
    $employeesCollection = json_decode(file_get_contents('../../resources/employees.json'), true); //convierte a varible de php (array)

    foreach ($employeesCollection as $index => $employee) {

        if ($employee['id'] == $id) {
            echo json_encode($employee);
        }
    }
    return false;
}

function removeAvatar($id)
{
    // TODO implement it
}

function getQueryStringParameters(): array
{
    // TODO implement it

    return [];
}

function getNextIdentifier(array $employeesCollection): int
{
    $employeesCollection = json_decode(file_get_contents('../../resources/employees.json'), true); //convierte a varible de php (array)

    $lastId = [];
    for ($i = 0; $i < count($employeesCollection); $i++) {
        array_push($lastId, $employeesCollection[$i]['id']);
    }

    return max($lastId) + 1;
}
