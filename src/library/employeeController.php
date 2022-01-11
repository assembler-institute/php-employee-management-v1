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
        http_response_code(202);
    } catch (Throwable $th) {
        http_response_code(404);
    }
}


$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {

case "POST":
    if (!isset($_GET['update'])) {
    $newEmployee = $_POST;
    $result = addEmployee($newEmployee);
    break;
    }

    
    if ($_GET["update"] == true) {
    $newEmployee = $_POST;
    $result = addEmployee($newEmployee);
    $_SESSION['newEmployee'] = $result;
    header("Location: ../employee.php?okUpdate");
    header("Location: ../employee.php?okUpdate");
    break;
    }
}