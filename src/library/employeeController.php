<?php

require_once("./employeeManager.php");
require_once "./avatarsApi.php";

//Controller get employees
if(isset($_GET["getEmployeers"])) {
    $resultArray = getEmployeers();
    echo json_encode($resultArray);
}

//Controller add employee with request JS
if(isset($_GET["addEmployee"])) {
    $data = $_POST;
    addEmployee($data);
}

//Controller add employee with request PHP
if(isset($_POST["addEmployee"])) {
    unset($_POST["addEmployee"]);
    $data = $_POST;
    addEmployee($data);
    header("Location: ../employee.php?newEmployeeAdded");
}

//Controller update employee with request JS
if(isset($_GET["modifyEmployee"])) {
    $data = $_POST["data"];
    updateEmployee($data);
}

//Controller update employee with request PHP
if(isset($_POST["modifyEmployee"])) {
    unset($_POST["modifyEmployee"]);
    $data = $_POST;
    updateEmployee($data);
    header("Location: ../employee.php?employeeUpdated");
}

//Controller delete employee
if(isset($_GET["delete"])) {
    $id = $_GET["delete"];
    deleteEmployee($id);
}

if(isset($_GET["startImage"])){
    $decodedImages =  getIndex($_GET["startImage"], $_GET["endImage"]);
    echo json_encode($decodedImages);
}