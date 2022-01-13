<?php
require_once('loginManager.php');

//check sesion & check sesion time
function checkSessionTime()
{
    session_start();
if (isset($_SESSION["logintime"])){
        if (time() >= $_SESSION["login_time"] + (15 * 1000)) {
            destroySession();
            header('Location: ../index.php?logout_time_expired');
        }
}
}

function checkSession()
{
    session_start();
    if (!isset($_SESSION["userName"])) {
        $_SESSION["loginerror"] = "You cannot access without login";
        header("location:../index.php");
    }
}