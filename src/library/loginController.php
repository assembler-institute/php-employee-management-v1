<?php
//Manage http requests
require_once('loginManager.php');

if (isset($_POST['email']) && isset($_POST['password'])){
    $logUser = $_POST["email"];
    $logPassword = $_POST["password"];

    validateLogin($logUser, $logPassword);
}

if(isset($_GET['logOut'])){
    session_destroy();
    header('Location: ../../index.php?logOut=true');
}
?>
