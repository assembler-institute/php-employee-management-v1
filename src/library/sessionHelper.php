<!-- This file will check that the user session is still active and if not, you must call the corresponding function of "loginManager.php" to logout the user. In the event that the user remains more than 10 minutes in the session, the user will have to be logged out.
-->
<?php
require_once('loginManager.php');

//check sesion & check sesion time
function checkSessionTime()
{
    session_start();
if (isset($_SESSION["logintime"])){
        if (time() >= $_SESSION["logintime"] + 600) {
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