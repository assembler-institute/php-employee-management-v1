<?php
    session_start();
    $timpo = (time()-$_SESSION['LAST_ACTIVITY']) ;
    
     if ($timpo > 600 ) {
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
        echo "true";
    }else {
        echo "false";
    }


?>