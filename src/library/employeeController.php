<?php

require_once "./employeeManager.php";


//todo detect when modifyEmployee have changes
//todo when have changes call PHP function to update employee
if (isset($_GET["modifyEmployee"])) {
    checkUser( "../../resources/employees.json");
    
}

if (isset($_GET['addEmployee'])) {
    addEmployee("../../resources/employees.json");
}

//todo detect when delEmployee have changes
//todo when have changes call PHP function to delete employee by ID
if(isset($_GET['delEmployee'])){
    $idEmployee =  $_GET['delEmployee'];
    deleteEmployee($idEmployee, "../../resources/employees.json");
}


?>
