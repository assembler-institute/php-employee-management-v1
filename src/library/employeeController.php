<?php

require './employeeManager.php';

$employees = getEmployees();
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    echo json_encode($employees);
    exit;
}

if ($method == 'POST') {
    if (addEmployee($_POST)) {
        echo json_encode($_POST);
        http_response_code(200);
        exit;
    };
    echo json_encode(['message' => 'could not create employee']);
    http_response_code(400);
}

if ($method == 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = $_DELETE['id'];
    deleteEmployee($id);
    exit;
}

if ($method == 'PUT') {
}
