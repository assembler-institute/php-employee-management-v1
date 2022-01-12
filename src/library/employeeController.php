<?php

require_once "./employeeManager.php";

if (isset($_GET["modifyEmployee"])) {
    echo "entra?";
    updateEmployee($_POST, "../../resources/employees.json");
}

if (isset($_GET['addEmployee'])) {
    echo "estamos aqui ";
    //print_r($_POST['name']);
    // $checkDash= recorrer("../../resources/employees.json",$_POST["email"]);
    
    addEmployee("../../resources/employees.json");

}
?>

<!-- <form action="../../resources/employees.json" method="post"></form> -->
