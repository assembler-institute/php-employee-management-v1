<?php
include_once 'employeeManager.php';

$method = $_SERVER['REQUEST_METHOD'];
$addEmployee = $_GET['addEmployee'];

if ($method == "POST" && !$_GET['addEmployee']) {
  $created = addEmployee($_POST);

  return true;
}

if ($method == "POST" && $_GET['addEmployee']) {
  $created = addEmployee($_POST);

  return header("Location:../dashboard.php");
}

if ($method == "PUT") {
  parse_str(file_get_contents("php://input"), $_PUT);

  $updated = updateEmployee($_PUT);

  return true;
}

if ($method == "DELETE") {
  parse_str(file_get_contents("php://input"), $_DELETE);

  $deleted = deleteEmployee($_DELETE["id"]);

  return true;
}
