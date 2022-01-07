<?php

require_once("./employeeManager.php");

if(isset($_GET["getEmployeers"])) {
    $resultArray = getEmployeers();
    echo json_encode($resultArray);
}

if(isset($_POST["name"])) {
    $data = $_REQUEST;
    unset($data["submit"]);
addEmployee($data);
}

if(isset($_POST["modifyEmployee"])) {
}