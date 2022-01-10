<?php

require_once("./employeeManager.php");

if(isset($_GET["getEmployeers"])) {
    $resultArray = getEmployeers();
    echo json_encode($resultArray);
}

if(isset($_POST["formEmployee"])) {
    $data = $_REQUEST;
    unset($data["submit"]);
addEmployee($data);
}

if(isset($_POST["modifyEmployee"])) {
}

if(isset($_POST["addEmployee"])) {
    $data = $_REQUEST;
    unset($data["submit"]);
addEmployee($data);
header("Location: ../employee.php?newEmployeeAdded");
}

if(isset($_GET["id"])) {
$id = $_GET["id"];
deleteEmployee($id);
}
