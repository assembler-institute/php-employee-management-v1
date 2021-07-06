<?php
session_start();

    if(isset($_GET["starting"])){
        echo"entra";
        $_SESSION["login_time"]=time();
        echo $_SESSION["login_time"] ;
        header("Location:../dashboard.php");
    }else if(isset($_GET["logout"])){
        session_unset();
        setcookie(session_name(),"",time() - 3600);
        session_destroy();
        session_start();
        $_SESSION["logout"]="You already logout";
        header("Location:../../index.php");
    }
        





//header("Location:../../index.php");