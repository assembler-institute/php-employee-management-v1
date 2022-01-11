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