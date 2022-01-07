<?php

function checkSession(){  
    session_start();
    if(!isset($_SESSION["login"]) || $_SESSION["login"] === "failed"){
        header("Location: ../index.php");
    }
}

?>