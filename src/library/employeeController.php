<?php
require_once "employeeManager.php";

if (isset($_GET['action'])&& $_GET['action']=== "getDataEmployees") {
    $employee = getEmployee();
    echo $employee;
}
// $functions = $_POST["function"];
// switch ($function) {
//     case 'read':
//         $employee = getEmployee();
//         break;
//     case 'delete':
//         # code...
//         break;
//     case 'create':
//         # code...
//         break;
//     case 'update':
//         # code...
//         break;
//     default:
//         # code...
//         break;
// }