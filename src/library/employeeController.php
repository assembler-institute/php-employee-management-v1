<?php

require_once "./employeeManager.php"; // la ruta tiene que iniciar en dashboard.

if (isset($_GET["action"]) && $_GET["action"] == "listEmployees") {
    // employeeDashboard();
    echo loadAllEmployees(); // file_get_contents('../../resources/employees.json')
}

// if(!empty($_POST[""]) && 
//    !empty($_POST[""]) && 
//    !empty($_POST[""]) && 
//    !empty($_POST[""]) && 
//    !empty($_POST[""]) && 
//    !empty($_POST[""]) && 
//    !empty($_POST[""]) && 
//    !empty($_POST[""]) && 
//    !empty($_POST[""])){

// }
