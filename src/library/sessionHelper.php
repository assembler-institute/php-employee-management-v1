<?php
session_start();

if (!isset($_SESSION["name"])) {
    header("Location: ./../index.php");
    exit;
} else {
    if(time()-$_SESSION["login_time_stamp"] > 600)
    {
        session_unset();
        session_destroy();
        header("Location: ./../index.php");
    }
}