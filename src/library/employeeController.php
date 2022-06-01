<?php

include_once('./employeeManager.php');

$id = $_GET['id'];
$update = $_POST['update'];

if (isset($id) && !$update) {
    header("Location: .././employee.php?id=$id");
}


if($update){
    // updateEmployee();
    echo "he dado update";
}