<?php 
require_once("./employeeManager.php");

if(isset($_GET["getEmployees"])) {
    $resultArray = getEmployees();
    echo json_encode($resultArray);
}