<?php

include('./employeeManager.php');

//request method is GET, call the getQueryStringParameters() function
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    getQueryStringParameters();
}

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