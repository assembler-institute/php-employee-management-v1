<?php 
require_once("./employeeManager.php");

$method = $_SERVER['REQUEST_METHOD']; //Receive the the method of the request(GET, POST, DELETE

switch ($method) {

    case "GET":
        if(isset($_GET["getEmployees"])) {
            $resultArray = getEmployees();
            echo json_encode($resultArray);
            break;
        }

    case "POST":
        if (isset($_GET['addEmployee_Form'])) {
            $newEmployee = $_POST;
            $result = addEmployee($newEmployee);
            header("Location: ../employee.php?id=".$result["id"]."&created");
            break;
            }
        elseif (isset($_GET['editEmployee_Form'])) {
            $newEmployee = $_POST;
            $result = updateEmployee($newEmployee);
            header("Location: ../employee.php?id=".$result["id"]."&updated");
            break;
            }
        elseif(isset($_GET['addEmployee'])) {
            $newEmployee = $_POST;
            $result = addEmployee($newEmployee);
            break;
            }
    case "DELETE":
        parse_str(file_get_contents("php://input"),$delete_vars);
        try {
            deleteEmployee($delete_vars['id']);
            http_response_code(202);
        } catch (Throwable $th) {
            http_response_code(404);
        }
        break;

}