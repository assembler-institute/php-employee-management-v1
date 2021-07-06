<?php

require './employeeManager.php';

$employees = getEmployees();
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'GET') {
    echo json_encode($employees);
    exit;
}

if ($method == 'POST') {
}

if ($method == 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = $_DELETE['id'];
    deleteEmployee($id);
    exit;
}

if ($method == 'PUT') {
}
