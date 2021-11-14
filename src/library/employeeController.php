<?php

require("./employeeManager.php");
// $_POST = json_decode(file_get_contents('php://input', true), true);

$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
    // var_dump($_POST['data']);
    // die();
    if (addEmployee($_POST['data'])) {
        echo json_encode("employee created succesfully");
    } else {
        echo json_encode("error ");
    }
};




// $jsonString = file_get_contents("../../resources/employees.json");
// if ($method === 'GET') {
//     if (deleteEmployee($_GET['id'])) {
//         echo json_encode("employee created succesfully");
//     } else {
//         echo json_encode($jsonString);
//     }
// }
// if ($method == 'PATCH') {
// };

// if ($method == 'GET') {
//     updateEmployee($_PUT['data']);
// };

// switch ($_SERVER["REQUEST_METHOD"]) {
//     case "GET":
//         header("Content-Type: application/json");
//         $jsonString = file_get_contents("../../resources/employees.json");
//         if (isset($_GET["id"])) {
//             echo getEmployee($_GET["id"]);
//         } else {
//             echo $jsonString;
//         }
//         break;
//     case "POST":
//         echo addEmployee($_POST);
//         break;
//     case "UPDATE":
//         parse_str(file_get_contents("php://input"), $_UPDATE);
//         updateEmployee($_UPDATE);
//         break;
//     case "DELETE":
//         parse_str(file_get_contents("php://input"), $_DELETE);
//         deleteEmployee($_DELETE["id"]);
//         break;
// }