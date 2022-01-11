<?php

    require_once("./employeeManager.php");

    if (isset($_SERVER['REQUEST_METHOD'])){
        switch($_SERVER['REQUEST_METHOD']){
            case "GET": getEmployees(); break;
            case "POST": addEmployee(); break;
            case "PUT": updateEmployee(); break;
            case "DELETE": deleteEmployee(); break;
        }
    }

?>