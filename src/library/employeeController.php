<?php

include_once 'employeeManager.php';

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){
    $created = addEmployee($_REQUEST);
}

if($method == 'PUT'){

}

if($method == 'PATCH'){

}

if($method == 'DELETE'){

}

//$employees = json_encode($data,true);
//echo $employees;
