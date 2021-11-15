<?php
// This file will handle the user's HTTP requests when they want to log in or log out, therefore, it must call the functions of the "loginManager.php" once the request has been received to carry out the action.

//gets things from view

require_once "loginManager.php";

session_start();

//if logout
if(isset($_GET["logout"]) && $_GET["logout"]) destroySession();

//if login
if (isset($_POST["email"]) && $_POST["email"] ) authUser();


