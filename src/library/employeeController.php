<?php

include('./employeeManager.php');

//request method is GET, call the getQueryStringParameters() function
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    getQueryStringParameters();
} else if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST["delete"]){
        echo "entrando";
        // $res = explode("-",$_GET["action"])[0];
        // if($res === 'delete'){
        //     $id = explode("-",$_GET["action"])[1];
            deleteEmployee($_POST["delete"]);
        // }
    }else if ($_POST["info"]){
        
        getEmployee($_POST["info"]);

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