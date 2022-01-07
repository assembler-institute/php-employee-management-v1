<?php

    session_start();
    $usermail= $_POST['usermail'];
    $password=$_POST['password'];

    if( strlen($usermail) != 0 && strlen($password) != 0){
        $_SESSION['usermail']= $usermail;
        echo 'sesion creada ';
    }
    header("location: ../dashboard.php");

?>