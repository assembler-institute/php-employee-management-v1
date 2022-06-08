<?php
session_start();
include('./employeeManager.php');

//request method is GET, call the getQueryStringParameters() function
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET["leng"])){
        getLengthDataBs();
    }else{
    getQueryStringParameters($_GET["empl"]);
    }
} else if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if($_POST["delete"]){

            deleteEmployee($_POST["delete"]);

    }else if ($_POST["info"]){
        
        $employeeData = getEmployee($_POST["info"]);
        $_SESSION["employeeData"] = $employeeData;
        
        
        header ("Location: ../employee.php?info=true");

    }else if(isset($_POST["employee"])){
        //UpdateEmployee
        if($_POST["employee"] != "0"){
            echo "actualizando empleado";
            $employeeActive = array(
                "id" => $_POST["employee"],
                "name" => $_POST["name"],
                "lastName" => $_POST["lastName"],
                "email" => $_POST["email"],
                "gender" =>$_POST["gender"],
                "age" => $_POST["age"],
                "streetAddress" => $_POST["streetAddress"],
                "city" => $_POST["city"],
                "state" => $_POST["state"],
                "postalCode" => $_POST["postalCode"],
                "phoneNumber" => $_POST["phoneNumber"]);
        
            updateEmployee($employeeActive);
        }else{
            //CreateEmployee
            $newEmployee = array(
                "id" => "",
                "name" => $_POST["name"],
                "lastName" => $_POST["lastName"],
                "email" => $_POST["email"],
                "gender" =>$_POST["gender"],
                "age" => $_POST["age"],
                "streetAddress" => $_POST["streetAddress"],
                "city" => $_POST["city"],
                "state" => $_POST["state"],
                "postalCode" => $_POST["postalCode"],
                "phoneNumber" => $_POST["phoneNumber"]);
        
            addEmployee($newEmployee);

        }
    }else{
        $newEmployee = file_get_contents('php://input');
        $newEmployee = json_decode($newEmployee, true);
        addEmployee($newEmployee);
    }

}