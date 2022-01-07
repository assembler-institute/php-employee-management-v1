<?php

require_once("./employeeManager.php");

if(isset($_GET["getEmployeers"])) {
    $resultArray = getEmployeers();
    echo json_encode($resultArray);
}

if(isset($_POST["addEmployeePHP"])) {
    print_r($_POST["addEmployeePHP"]);
}

if(isset($_POST["modifyEmployee"])) {
}