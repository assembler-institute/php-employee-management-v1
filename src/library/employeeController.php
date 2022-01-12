<?php

require_once("./employeeManager.php");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET' && isset($_GET["display"])){
    displayEmployee();
}

if($method=='GET' && isset($_GET['userId']))
{
    getEmployee($_GET['userId']);

}
if($method == "PUT" || $method=="POST" && isset($_GET["update"])){
    //expand of the PUT content sended by fetch
    $employeUpdated=json_decode(file_get_contents("php://input"),true);
    updateEmployee($employeUpdated);
}

if($method == "POST" && isset($_GET["newEmployee"])){
    $newEmployee=json_decode(file_get_contents("php://input"),true);
    addEmployee($newEmployee);
}

if ($method === 'DELETE'){
    deleteEmployee($_GET["delete"]);
}