<?php
require_once("./employeeManager.php");


if(isset($_GET["display"])){
    displayEmployee();
}

if(isset($_GET['userId']))
{
    $employeeObj=getEmployee($_GET['userId']);
    echo json_encode($employeeObj);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    deleteEmployee($_GET["delete"]);
}