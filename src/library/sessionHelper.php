<?php 
session_start();

if ($_GET["destroyUpdate"] == true){
     echo "En teoria entro y debo vaciar la sesion";
     unset($_SESSION["employeeUpdate"]);
     unset($_SESSION['newEmployee']);
     header("Location: ../employee.php");
}
