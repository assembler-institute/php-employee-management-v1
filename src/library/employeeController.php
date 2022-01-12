<?php

require "./employeeManager.php";

if (isset($_GET["modifyEmployee"])) {
    updateEmployee($_POST);
}

if (isset($_GET['addEmployee'])) {
    addEmployee();
}

if(isset($_GET['delEmployee'])){
    $idEmployee =  $_POST['id'];
    deleteEmployee($idEmployee);
}
