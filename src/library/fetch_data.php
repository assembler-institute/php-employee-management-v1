<?php

    $employeesJsonFile = "./../../resources/employees.json";

    if(file_exists($employeesJsonFile)) {
        // If employees database exist, load all employees
        $jsonData = file_get_contents($employeesJsonFile);
        $employeesData = json_decode($jsonData, true);
    }

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'GET') {

    }