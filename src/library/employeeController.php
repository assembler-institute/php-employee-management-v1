<?php
if ($_SERVER['REQUEST_METHOD']==='GET') {
    require_once("./employeeManager.php");
    $storedEmployes= getEmployeesData();
    echo json_encode($storedEmployes);
   

}