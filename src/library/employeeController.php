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

if(isset($_GET["modifyEmployee"])) {
   $data =   $_POST["data"];
   print_r($data);
updateEmployee($data);
}

if(isset($_POST["addEmployee"])) {
    $data = $_REQUEST;
    unset($data["submit"]);
addEmployee($data);
unset($_POST["addEmployee"]);
}

if(isset($_GET["delete"])) {
$id = $_GET["delete"];
deleteEmployee($id);
}

if(isset($_GET["editEmployee"])){
    header("Location: ../employee.php?editEmployee");
}