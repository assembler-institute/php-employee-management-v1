<!-- 
This file will check that the user session is still active and if not,
you must call the corresponding function of "loginManager.php" to logout the user.
In the event that the user remains more than 10 minutes in the session, the user will have to be logged out. -->
<?php
require_once('loginManager.php');
if (!isset($_SESSION)) {
    session_start();
}
function destroySession()
{
    session_start();
    unset($_SESSION);
    destroySessionCookie();
    session_destroy();
    header("Location:../../index.php?logOut=true");
}

function destroySessionCookie()
{
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
}
