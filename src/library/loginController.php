<?php
function validateLoginData($launchUser, $launchPassword, $logedUser, $logedPassword){


        switch (true) {
            case ($launchUser==$logedUser && password_verify($launchPassword,$logedPassword)):
                    return "Loged";
                    break;
            case (($launchUser!=$logedUser) && !password_verify($launchPassword,$logedPassword)):
                    return "Wrong name and password";
                    break;
            case (!($launchUser==$logedUser)):
                    return "Wrong name";
                    break;
            case (!password_verify($launchPassword,$logedPassword)):
                    return "Wrong password";
                    break; 
            default:
                    break;
        }
    }

function startSession()
{
        $_SESSION["login_time"] = time();
        header("Location:../dashboard.php");
}

function deleteSession()
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
}