<?php
//Manage http requests
require_once('loginManager.php');

if (isset($_POST['email']) && isset($_POST['password'])){
    $logUser = $_POST["email"];
    $logPassword = $_POST["password"];

    validateLogin($logUser, $logPassword);
}

if (isset($_GET['logout'])) {

    destroySession();
    header("Location:../../index.php");
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
    header("Location:../index.php?logout=true");

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