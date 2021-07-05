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
}

if ($method == 'PUT') {
}
