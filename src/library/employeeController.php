<?php

require './employeeManager.php';

$employees = getEmployees();
$method = $_SERVER['REQUEST_METHOD'];

// echo '<pre>';
// var_dump($employees);
// echo '</pre>';
// exit;

if ($method == 'GET') {
    echo json_encode($employees);
    exit;
}

if ($method == 'POST') {
    $newEmployee = [
        "name" => $_POST['name'],
        "age" => $_POST['age'],
    ];
    addEmployee($newEmployee);
}

if ($method == 'DELETE') {
}

if ($method == 'PUT') {
}
