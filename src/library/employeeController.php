<?php
    session_start();

    require_once('./employeeManager.php'); 

    if (isset($_GET['action']) && $_GET['action'] === 'list') {
        printEmployees();

    } else if (isset($_GET['action']) && $_GET['action'] === 'create') {
        
        $newEmployee = [
            "id"            => 0, 
            "name"          => $_POST['name'],
            "lastName"      => $_POST['lastName'],
            "email"         => $_POST['email'],
            "gender"        => $_POST['gender'],
            "city"          => $_POST['city'],
            "streetAddress" => $_POST['address'],
            "state"         => $_POST['state'],
            "age"           => $_POST['age'],
            "postalCode"    => $_POST['postalCode'],
            "phoneNumber"   => $_POST['phoneNumber'],
        ];
        addEmployee($newEmployee);

    } else if (isset($_GET['action']) && $_GET['action'] === 'read') {

    } else if (isset($_GET['action']) && $_GET['action'] === 'update') {

    } else if (isset($_GET['action']) && $_GET['action'] === 'delete') {

    }
    
    
   