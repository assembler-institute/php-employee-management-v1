<?php

require_once("loginManager.php");
function checkSession(){
    // Start session
    session_start();

    $urlFile = basename($_SERVER['REQUEST_URI']);
    
    if ($urlFile == "index.php" || $urlFile == "php-employee-management-v1" ){
      
        if (isset($_SESSION["user"])) {
            header("Location: ./src/dashboard.php");
        } else {
            // Check for session error
            if (isset($_SESSION["loginError"])) return $_SESSION["loginError"];

        }
    } else {
        if (!isset($_SESSION["user"])) {
            $_SESSION["loginError"] = "You don't have permission to enter the dashboard. Please Login.";
            header("Location:../../index.php");
        }
    }

}