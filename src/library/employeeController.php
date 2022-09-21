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
        getEmployee($employeeId);

    } else if (isset($_GET['action']) && $_GET['action'] === 'update') {
        $updateEmployee = [
            "id"            => $_GET['id'], 
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
        updateEmployee($updateEmployee);

    } else if (isset($_GET['action']) && $_GET['action'] === 'delete') {
        $employeeId = $_GET['id'];
        deleteEmployee($employeeId);
    }
    
    
   