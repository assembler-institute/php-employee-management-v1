<?php
require_once("./loginManager.php");

if(isset($_GET["login"])) {
        logincheck();
    }
if(isset($_GET["logout"])) {
        destroySession();
        header('Location: ../../index.php?logOut=true2');
    }


function startSession()
{
        $_SESSION["logintime"] = time();
        header("Location:../dashboard.php");
}

/*function deleteSession()
{
    unset($_SESSION);
    // destroy session cookie
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
    session_destroy();
    header("location:./../index.php");
}*/