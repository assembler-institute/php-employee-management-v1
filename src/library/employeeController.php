<?php
session_start();
include('./employeeManager.php');

//request method is GET, call the getQueryStringParameters() function
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    getQueryStringParameters();
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
            echo "creando empleado";
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
    $newEmployee = array(
        "id" => "",
        "name" => $_POST["name"],
        "lastName" => "",
        "email" => $_POST["email"],
        "gender" => "",
        "age" => $_POST["age"],
        "streetAddress" => $_POST["address"],
        "city" => $_POST["city"],
        "state" => $_POST["state"],
        "postalCode" => $_POST["postalCode"],
        "phoneNumber" => $_POST["phone"]);

    addEmployee($newEmployee);
    }

}else if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    echo "entrando";
    $res = explode("-",$_GET["action"])[0];
    if($res === 'delete'){
        $id = explode("-",$_GET["action"])[1];
        deleteEmployee($id);
    }
}