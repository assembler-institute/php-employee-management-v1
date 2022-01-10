<?php

include_once ('./employeeManager.php');

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){
  addEmployee($_REQUEST);
};
if($method == 'DELETE'){
  deleteEmployee($_REQUEST);
}