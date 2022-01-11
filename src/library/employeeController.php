<?php

require "./employeeManager.php";

if (isset($_GET["modifyEmployee"])) {
    echo "entra?";
    updateEmployee($_POST);
}

if (isset($_GET['addEmployee'])) {
    echo "estamos aqui ";
    //print_r($_POST['name']);
    addEmployee("../../resources/employees.json");

}
?>

<!-- <form action="../../resources/employees.json" method="post"></form> -->
