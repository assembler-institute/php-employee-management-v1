<?php

include('./employeeManager.php');

if ($_POST){
    // $name = $_POST["name"];
    // $email = $_POST["email"];
    // $age = $_POST["age"];
    // $address = $_POST["address"];
    // $city = $_POST["city"];
    // $state = $_POST["state"];
    // $postalCode = $_POST["postalCode"];
    // $phone = $_POST["phone"]; 

    $newEmployee = array($_POST["name"], $_POST["email"], $_POST["age"], $_POST["address"], $_POST["city"], $_POST["state"], $_POST["postalCode"], $_POST["phone"]);

    addEmployee($newEmployee);
}