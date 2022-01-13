<?php

require_once "./employeeManager.php";

//todo detect when modify employee have changes
//todo when have changes call PHP function to update employee
if (isset($_GET["modifyEmployee"])) {
    updateEmployee($_POST, "../../resources/employees.json");
}

// if (isset($_GET['modifyEmployee'])) {
   
//     echo "estamos aqui ";
//     //print_r($_POST['name']);
//     // $checkDash= recorrer("../../resources/employees.json",$_POST["email"]);
    
//     //addEmployee("../../resources/employees.json");

//     updateEmployee($_POST, "../../resources/employees.json");
// }

if (isset($_GET['addEmployee'])) {
    addEmployee("../../resources/employees.json");
}

//todo detect when modify employee have changes
//todo when have changes call PHP function to delete employee by ID
if(isset($_GET['delEmployee'])){
    $idEmployee =  $_POST['id'];
    deleteEmployee($idEmployee, "../../resources/employees.json");
}