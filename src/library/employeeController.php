<?php

require_once "./employeeManager.php";


//todo detect when modifyEmployee have changes
//todo when have changes call PHP function to update employee
if (isset($_GET["modifyEmployee"])) {

    updateEmployee($_POST,"../../resources/employees.json");
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

if (isset($_POST['submitForm'])) {
        $seemail= recorrer("../../resources/employees.json", $_POST['email']);
        if (isset($_GET['id']) ) {
            if($_POST["lastName"] != " " && $_POST["radio"] != " "){
                updateEmployee($_POST, "../../resources/employees.json");
            }
            print_r($_POST);
        } else if($seemail){
            echo "this email is already in use";
        }else{
            addEmployee("../../resources/employees.json");
            header("Location:../dashboard.php");
        }
    }
    if(isset($_POST['Cancel'])){
        header("Location:../dashboard.php");
    }
?>
<form action=".././dashboard.php"></form>
