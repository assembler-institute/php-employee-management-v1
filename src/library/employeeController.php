<?php

include_once ('./employeeManager.php');

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){
  addEmployee($_REQUEST);
};
if($method == 'DELETE'){
  $_delete = file_get_contents('php://input');
  deleteEmployee(substr($_delete, 3));
}