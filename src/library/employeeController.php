<?php
require("./employeeManager.php");

if (json_decode(file_get_contents('php://input', true), true)) {
    $_POST = json_decode(file_get_contents('php://input', true), true);
}

$_PATCH = json_decode(file_get_contents('php://input', true), true);
// var_dump($_PATCH);



var_dump($_SERVER["REQUEST_METHOD"]);

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $newData = $_GET["data"];
    $_SERVER["REQUEST_METHOD"] = "PATCH";
}

// print_r($newData);

var_dump($_SERVER["REQUEST_METHOD"]);



switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        if (addEmployee($_POST['data'])) {
            echo json_decode("user Created succesfully");
        } else {
            echo json_encode("error ");
        }
        break;
    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        if (deleteEmployee($_DELETE['id'])) {
            echo json_encode("employee Deleted succesfully");
        } else {
            echo json_encode("error ");
        }
        break;

    case "PATCH":
        // json_encode(updateEmployee($_PATCH['data']));
        // parse_str(file_get_contents("php://input"), $_PATCH);
        $newData ? updateEmployee($newData) : updateEmployee($_PATCH['data']);
        // updateEmployee($_PATCH['data']);
        // updateEmployee($newData);


        break;
}
header("location: ../../src/dashboard.php");
