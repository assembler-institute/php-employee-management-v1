<?php
require("employeeManager.php");

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "GET":
        return "Getting data";
        break;
    case "PUT":
        // updateEmployee();
        break;
    case "POST":
        addEmployee();
        break;
    case "DELETE":
        // deleteEmployee();
        break;
    default:
        return "Not valid method";
}


// function employeePage()
// {
//     getEmployee();
// }
