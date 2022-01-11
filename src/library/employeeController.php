<?php
// session_start();
// isset($_SESSION["email"]) ? header("Location:./src/dashboard.php") : "";
require "./employeeManager.php";

if(isset($_GET["modifyEmployee"])){
    echo "entra?";
   updateEmployee($_POST);
}

?>

