<!-- 
This file will check that the user session is still active and if not,
you must call the corresponding function of "loginManager.php" to logout the user.
In the event that the user remains more than 10 minutes in the session, the user will have to be logged out. -->

<?php

session_start();

// To check if session is started.
if(isset($_SESSION))
{
    if(time()-$_SESSION["login_time_stamp"] > 5) 
    {
        session_unset();
        session_destroy();
        header("Location:index.php");
    }
}

