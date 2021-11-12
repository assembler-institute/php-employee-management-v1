<?php

require_once("./employeeManager.php");

switch ($_SERVER["REQUEST_METHOD"]) {
    case 'POST':
        addEmployee($_POST);
        break;
    case 'PUT':
        parse_str(file_get_contents("php://input"), $put_vars);
        updateEmployee($put_vars);
        break;
    case "DELETE":
        parse_str(file_get_contents("php://input"), $delete_vars);
        deleteEmployee($delete_vars["id"]);
        break;
    default:
        break;
}
