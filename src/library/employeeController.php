<?php
require("./employeeManager.php");
// $_POST = json_decode(file_get_contents('php://input', true), true);



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
    case "UPDATE":
        parse_str(file_get_contents("php://input"), $UPDATE);
        if (updateEmployee($UPDATE['id'])) {
            echo json_encode("employee Update succesfully");
        } else {
            echo json_encode("error ");
        }
        break;
}
