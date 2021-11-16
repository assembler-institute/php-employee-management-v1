<?php

if (isset($_POST["email"])) {
    verifyuser();
}

if (isset($_GET["logout"])) {
    destroySession();
}



//Verify user
function verifyuser()
{
    include_once("loginManager.php");
    
    foreach ($users["users"] as $user) {
        
         if ($user["email"] == $email) {
             
            //user registered
            if (password_verify($password, $user["password"])) {
                //All ok log in
                session_start();
                $_SESSION["username"] = $email;
                $_SESSION['timeout'] = time();
                echo "Login ok";
                
            } else {
                echo "Invalid password";
            }
        } else {
            echo "User not found";
        } 
    }
}

function destroySession()
{
    // Start session
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    //session_start();

    // Unset all session variables
    unset($_SESSION);

    // Destroy session cookie
    //destroySessionCookie();


    // Destroy the session
    session_destroy();
    
    if (!headers_sent()) {
        header("Location: ../../index.php");
        exit;
    }
    
    //header("Location: ../index.php");
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
