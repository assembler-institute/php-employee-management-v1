<?php

require_once "./employeeManager.php";

if (isset($_GET["modifyEmployee"])) {
    // echo "entra?";
    updateEmployee($_POST, "../../resources/employees.json");
    print_r($_POST);
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


if(isset($_GET['delEmployee'])){
    $idEmployee =  $_POST['id'];
    deleteEmployee($idEmployee, "../../resources/employees.json");
}
?>
<!-- <form action="./." method="post"></form> -->

if (isset($_POST["endSession"])) {
    sessionlogout();
}