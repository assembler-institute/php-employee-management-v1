<?php

require_once("./employeeManager.php");
 if(isset($_GET["employees"])){
    $empleados=leerempleados();
    echo json_encode($empleados);
 }
 if(isset($_GET["delete"])){
   deleteEmployee($_GET["delete"]);
 }
 if (isset($_GET["add"])) {
   if(addEmployee($_POST)){
      echo "true";
   };      // send the info received (in $_POST) to employeeManager using the function addEmployee
}
if(isset($_GET["edit"])){
   if(updateEmployee($_GET["edit"])){
      echo "true";
   }
}





