<?php

include_once 'employeeManager.php';

$method = $_SERVER['REQUEST_METHOD'];

/**
 * Create a New Employee
 */
if($method == 'POST'){
    echo "<pre>";
    print_r($_REQUEST);
    die();
    $created = addEmployee($_REQUEST);
}

/**
 * Update Employee
 */
if($method == 'PUT'){
    $employeeFix = [];
    $_update = file_get_contents('php://input');
    $array_employee = explode('&',$_update);

    foreach($array_employee as $index => $item){
        $fixDate = explode('=',urldecode($item));
        $employeeFix[$fixDate[0]] = $fixDate[1];
    }

    $edit = updateEmployee($employeeFix);
}

if($method == 'PATCH'){

}

/**
 * Delete Employee
 */
if($method == 'DELETE'){
    $_delete = file_get_contents('php://input');
    $delete = deleteEmployee(substr($_delete,3));
}

//$employees = json_encode($data,true);
//echo $employees;
