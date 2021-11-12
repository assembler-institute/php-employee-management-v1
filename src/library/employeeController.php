<?php

require("./employeeManager.php");
$_POST = json_decode(file_get_contents('php://input', true), true);

$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
    if (addEmployee($_POST['data'])) {
        echo json_encode("employee created succesfully");
    } else {
        echo json_encode("error ");
    }
};

// if ($method == 'PUT') {
// };

// if ($method == 'PATCH') {
// };

if ($method === 'GET') {
    print_r($_GET['id']);
    // deleteEmployee($_GET['id']);
}
