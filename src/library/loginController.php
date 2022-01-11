<?php
    require_once("./loginManager.php");
    if(isset($_POST["username"])){
        session_start();
        if(comprovacion()){
        iniciarSesion(comprovacion());
        header("location: ../dashboard.php");
        }else{
            header("location: ../../index.php?error");
        }
    }
    if(isset($_GET["Logout"])){
        session_start();
        cerrarSesion();
        header("location: ../dashboard.php");
    }
?>