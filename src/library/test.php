<?php

// require "./employeeManager.php";

// $id = "1";

// $employee = getEmployee($id);

// echo "<pre>";
// var_dump($employee);
// echo "</pre>";


function getEmployees() {
    return json_decode(file_get_contents('../resources/employees.json'), true); // returns an associative array
}

$employees = getEmployees();

echo "<pre>";
var_dump($employees);
echo "</pre>";


// function getEmployee(string $id)
// {
//     $employees = getEmployees();
//     foreach ($employees as $employee) {
//         if ($employee["id"] == $id) {
//             return $employee;
//         }
//     }
// }
// $users = getEmployee("1");

// echo "<pre>";
// var_dump($users);
// echo "</pre>";
?>