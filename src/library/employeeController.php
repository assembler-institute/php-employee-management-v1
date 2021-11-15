<?php

include_once 'employeeManager.php';

$method = $_SERVER['REQUEST_METHOD'];

/**
 * Create a New Employee
 */
if($method == 'POST'){
/*     var_dump($_REQUEST);
    die(); */
    $created = addEmployee($_REQUEST);

}

/**
 * Update Employee
 */
if($method == 'PUT'){
    $employeeFix = [];
    $array_employee = file_get_contents('php://input');
/*     var_dump(intval($_update['id'])); 
    die(); */
     $array_employee = explode('&',$array_employee);

    foreach($array_employee as $index => $item){
        $fixDate = explode('=',urldecode($item));
        if($fixDate[0] == 'id'){
            $employeeFix[$fixDate[0]] = intval($fixDate[1]);
        }else{
            $employeeFix[$fixDate[0]] = $fixDate[1];
        }
        
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
