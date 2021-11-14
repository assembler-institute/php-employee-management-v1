<?php
//Manage http requests
require_once('loginManager.php');

if (isset($_POST['email']) && isset($_POST['password'])){
    $logUser = $_POST["email"];
    $logPassword = $_POST["password"];
    
    validateLogin( $logUser, $logPassword);
}
else{
    
}

if(isset($_GET['logOut'])){
    header('Location: ../../index.php?logOut=true');
    destroySession();
}
?>
