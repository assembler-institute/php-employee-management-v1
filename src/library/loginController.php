<!-- This file will handle the user's HTTP requests when they want to log in or log out , therefore, it must call the functions of the " loginManager.php " once the request has been received to carry out the action . -->

<?php

include "./loginManager.php";

if(isset($_POST["email"]) && isset($_POST["password"])) {
    //Get email user inserted
    $userEmail = $_POST["email"];
    //Get password user inserted
    $userPassword = $_POST["password"];

    //Validation email and password true or false?
    $validationCredentials = validateUser($userEmail, $userPassword);
    //Redirect if true or false
    if($validationCredentials === true) {
        $url = "../dashboard.php";
        header('Location: ' . $url);
    } else {
        $url = "../../index.php";
        header("Refresh: 0; URL=$url?error=Login incorrect!");
        exit();
    }
}
if(isset($_POST["logout"])) {
    $errorClosed = logout("Session closed!");
    $url = "../../index.php";
    header('Location: ' . $url . "?error=$errorClosed");
    exit();
}
exit();
