<?php

require('employeeManager.php');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': {
            $ids = !empty($_GET['ids']) ? explode(',', $_GET['ids']) : [];
            echo getEmployees($ids);
            break;
        }
    case 'POST': {
            if (isset($_POST)) {
                addEmployee($_POST);
                http_response_code(201);
                header('Location: http://localhost/php-employee-management-v1/src/dashboard.php');
            } else {
                http_response_code(400);
            }
            break;
        }
    case 'PUT': {
            $employeeData = file_get_contents('php://input');
            echo var_dump(json_decode($employeeData, true));
            updateEmployee(json_decode($employeeData, true));
            break;
        }
    case 'DELETE': {
            if (isset($_GET['id'])) {
                echo deleteEmployee($_GET['id']);
                http_response_code(204);
            }
            break;
        }
}
