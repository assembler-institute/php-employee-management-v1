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
   addEmployee($_POST);     // send the info received (in $_POST) to employeeManager using the function addEmployee
}
if(isset($_GET["edit"])){
      if(updateEmployee($_GET["edit"])){
         echo "true";
      }
      else{
         echo "false";
      }
}
if(isset($_GET["employee"])){
   if($_GET["employee"]==0){

   }else{
      updateEmployee($_GET["employee"]);
      header("location: ../dashboard.php");
   }
}





