<?php

// session_start();
//! Make the logout of the session

// if(isset($_POST["logout"])){
//     sessionlogout();
// }


//! Functions

function sessionlogout(){
    unset($_SESSION);
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
    header("Location:../../index.php");
}