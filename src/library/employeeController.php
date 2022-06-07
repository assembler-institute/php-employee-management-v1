<?php
if ($_SERVER['REQUEST_METHOD']==='GET') {
    require_once("./employeeManager.php");
    $storedEmployes= getEmployeesData();
    echo json_encode($storedEmployes);
   
}

if ($_SERVER['REQUEST_METHOD']==='POST'){
if(isset($_POST['newEmployee'])){
    // echo json_encode($_POST);
    require_once("./employeeManager.php");
    addEmployee($_POST);
}
}
