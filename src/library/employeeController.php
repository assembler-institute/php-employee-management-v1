<?php
require("./employeeManager.php");

if (json_decode(file_get_contents('php://input', true), true)) {
    $_POST = json_decode(file_get_contents('php://input', true), true);
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    if (addEmployee($_POST['data'])) {
        echo json_encode("employee created succesfully");
    } else {
        echo json_encode("error ");
    }
};

if ($method === 'GET') {
    if (deleteEmployee($_GET['id'])) {
        echo json_encode("employee created succesfully");
    } else {
        echo json_encode("error ");
    }
}



// if ($method == 'PATCH') {
// };

// if ($method == 'GET') {
//     updateEmployee($_PUT['data']);
// };
