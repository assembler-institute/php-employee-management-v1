<?php

    require_once("./employeeManager.php");

    if (isset($_SERVER['REQUEST_METHOD'])){

        parse_str(file_get_contents("php://input"), $sent_vars);
        //echo json_encode($sent_vars["edit"]);

        switch($_SERVER['REQUEST_METHOD']){
            case "GET": getEmployees(); break;
            case "POST": addEmployee(json_encode($_POST["add"])); break;
            case "PUT": updateEmployee(json_encode($sent_vars["edit"])); break;
            case "DELETE": deleteEmployee(); break;
        }
    }

?>