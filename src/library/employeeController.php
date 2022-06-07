<?php
require_once "./employeeManager.php";
//DISPLAY EMPLOYEES IN THE DASHBOARD
if (isset($_GET['action'])&& $_GET['action']=== "getDataEmployees") {
    $employee = getEmployee();
    echo $employee;
}

//DELETE EMPLOYEE
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $inputdata = file_get_contents("php://input");
        $dataId = json_decode($inputdata);
        deleteEmployee($dataId);
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