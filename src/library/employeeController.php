<?php
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
  case 'GET':
    $jsonEmployees = file_get_contents("../../resources/employees.json");
    echo $jsonEmployees;
    break;

  case 'PUT':
    $jsonEmployees = file_get_contents("../../resources/employees.json");
    echo $jsonEmployees;
    break;

  case 'POST':
    $jsonEmployees = file_get_contents("../../resources/employees.json");
    echo $jsonEmployees;
    break;

  case 'DELETE':
    $jsonEmployees = file_get_contents("../../resources/employees.json");
    echo $jsonEmployees;
    break;

  default:
    echo ("error");
    break;
}
