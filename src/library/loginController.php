<?php
if (isset($_POST["email"])) {
    verifyuser();
}

if (isset($_GET["logout"])) {
    destroySession();
}

if (!isset($_SESSION["username"])) {
    header("Location: ../../index.php");
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
    session_start();

    // Unset all session variables
    unset($_SESSION);

    // Destroy session cookie
    destroySessionCookie();


    // Destroy the session
    session_destroy();
    header("Location: ../../index.php");
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
