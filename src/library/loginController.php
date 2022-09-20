<?php

/* This file will handle the user's HTTP requests when they want to log in or log out, 
therefore, it must call the functions of the "loginManager.php" once the request has 
been received to carry out the action. */

require_once "./loginManager.php";

if (isset($_GET["action"])) {
    if ($_GET["action"] == "login") {
        login();
    }
    
    if ($_GET["action"] == "logout") {
        logout();
    }
    
    // if ($_GET["action"] == "loginError") {
    //     loginError();
    // }
}

