<?php 
require_once("./employeeManager.php");

if(isset($_GET["getEmployees"])) {
    $resultArray = getEmployees();
    echo json_encode($resultArray);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') { 
    parse_str(file_get_contents("php://input"),$delete_vars);
    
    
    try {
        deleteEmployee($delete_vars['id']);
        header("Content-Type: application/json");
        echo json_encode("{}");
    } catch (Throwable $th) {
        http_response_code(404);
    }
}