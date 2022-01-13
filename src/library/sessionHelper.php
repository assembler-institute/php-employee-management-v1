<?php
require_once('loginManager.php');

//check sesion & check sesion time
function checksessiontime()
{
if (isset($_SESSION["logintime"])){
    if (isset($_Get["timeoutcheck"])) {
        if (time() - $_SESSION["login_time"] >= 30 * 1) {
            echo "Log out";
        }
    }
}
}

function checkSession()
{
    if (!isset($_SESSION["email"])) {
        $_SESSION["loginerror"] = "You cannot access without login";
        header("location:./index.php");
    }
}