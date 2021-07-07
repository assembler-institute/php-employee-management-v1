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
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = $_DELETE['id'];
    deleteEmployee($id);
    exit;
}

if ($method == 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    if (updateEmployee($_PUT['id'], $_PUT)) {
        echo json_encode(["Message" => "Employee updated", "Status" => true]);
    } else {
        echo json_encode(["ErrorMessage" => "Error updating employee", "Status" => false]);
    }
}
