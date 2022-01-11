<?php

require_once("./employeeManager.php");

if(isset($_GET["getEmployeers"])) {
    $resultArray = getEmployeers();
    echo json_encode($resultArray);
}

if(isset($_GET["addEmployee"])) {
    $data = $_POST["newEmployee"];
    addEmployee($data);
}

if(isset($_POST["addEmployee"])) {
    unset($_POST["addEmployee"]);
    $data = $_POST;
    addEmployee($data);
}

if(isset($_GET["modifyEmployee"])) {
   $data = $_POST["data"];
updateEmployee($data);
}

if(isset($_GET["delete"])) {
$id = $_GET["delete"];
deleteEmployee($id);
}