<?php 
require_once("./employeeManager.php");
 if(isset($_GET["employees"])){
    $empleados=leerempleados();
    echo json_encode($empleados);
 }
 if(isset($_GET["delete"])){
 }
 if(isset($_GET["add"])){
    
}
?>