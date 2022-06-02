<?php

include('./employeeManager.php');

//request method is GET, call the getQueryStringParameters() function
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    getQueryStringParameters();

} else if($_SERVER['REQUEST_METHOD'] === 'POST') {

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