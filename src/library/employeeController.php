<?php

include_once('./employeeManager.php');

$id = $_GET['id'];


var_dump($_POST);

function getUserId($id){
    if (isset($id) && !$_POST['id']) {
        header("Location: .././employee.php?id=$id");
    }
}

getUserId($id);

function setEmployee($id){
    if($_POST['id'] && isset($id)){
        $employeeInfo = $_POST;
        unset($employeeInfo['update']);
        updateEmployee($employeeInfo);
    }
}

setEmployee($id);