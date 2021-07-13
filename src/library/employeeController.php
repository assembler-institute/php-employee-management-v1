<?php

require './employeeManager.php';
require './sessionHelper.php';

$employees = getEmployees();
$method = $_SERVER['REQUEST_METHOD'];

if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['authUserId'])) {
    $response = 'sessionTimeOut';
    echo ($response);
    exit;
}

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
    parse_str(file_get_contents("php://input"), $_PUT);

    if (isset($_PUT['id']) && getEmployeeById($_PUT['id'])) {
        if (updateEmployee($_PUT['id'], $_PUT)) {
            echo json_encode(["Message" => "Employee updated"]);
            http_response_code(200);
            exit;
        }

        echo json_encode(["Message" => "Error updating employee"]);
        http_response_code(400);
        exit;
    } else {
        if (addEmployee($_PUT)) {
            echo json_encode(["Message" => "Employee created"]);
            http_response_code(200);
            exit;
        };
        echo json_encode(['Message' => 'could not create employee']);
        http_response_code(400);
        exit;
    }
}
