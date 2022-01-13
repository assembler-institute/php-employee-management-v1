<?php

require_once("./employeeManager.php");

if (isset($_GET["employees"])) {
   $empleados = leerempleados();
   echo json_encode($empleados);
}

if (isset($_GET["delete"])) {
}

if (isset($_GET["add"])) {
   //  echo "pepe";
   // var_dump(isset($_GET["add"]));  // ME RETORNA UN BOLEANO:  TRUE
   // print_r(isset($_GET["add"]));  // ME RETORNA 1 que es true
   // var_dump($_POST);
   //  print_r($_POST);
   addEmployee($_POST);      // send the info received (in $_POST) to employeeManager using the function addEmployee
}

if (isset($_GET["edit"])) {
   updateEmployee($_GET["edit"]);
}
