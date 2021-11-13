<?php

require_once("./employeeManager.php");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        addEmployee();
        break;
    case 'GET':
        deleteEmployee($_GET["id"]);
        break;
    default:
        break;
  }