<?php

require_once "./employeeManager.php"; // la ruta tiene que iniciar en dashboard.

if (isset($_GET["action"])) {

    if ($_GET["action"] == "listEmployees") {
        echo loadAllEmployees(); // file_get_contents('../../resources/employees.json')
    }

    if ($_GET["action"] == "addEmployee") { 
        $createdEmployee = array(
            "age" => $_POST["employee-age"], // es el name del input.
            "city" => $_POST["employee-city"],
            "email" => $_POST["employee-email"],
            "gender" => $_POST["employee-gender"],
            "id" => $_POST["employee-id"],
            "lastName" => $_POST["employee-gender"],
            "name" => $_POST["employee-name"],
            "phoneNumber" => $_POST["employee-phone-number"],
            "postalCode" => $_POST["employee-postal-code"],
            "state" => $_POST["employee-state"],
            "streetAddress" => $_POST["employee-street-address"]
        );

        echo addNewEmployee($createdEmployee);
    }
} 
