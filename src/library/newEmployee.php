<?php

if(isset($_POST['name'])) {

    $employees = file_get_contents('../../resources/employees.json');
    $employeesArray = json_decode($employees, true);
    
    $id = (count($employeesArray));
    $id = $id - 1;

    $newEmployeeId = ($employeesArray[$id]['id']) + 1;

    $newEmployee = array(
        'id' => $newEmployeeId,
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'age' => $_POST['age'],
        'streetAddress' => $_POST['streetAddress'],
        'city' => $_POST['city'],
        'state' => $_POST['state'],
        'postalCode' => $_POST['postalCode'],
        'phoneNumber' => $_POST['phoneNumber']
    );
    
    $employeesArray[] = $newEmployee;
    $finalData = json_encode($employeesArray);
    file_put_contents('../../resources/employees.json', $finalData);
    print_r($finalData);
  }
  