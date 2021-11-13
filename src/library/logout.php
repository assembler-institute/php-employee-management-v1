<?php
session_start();

unset($_SESSION['name']);
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        "",
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httpOnly"],
    );
}

session_destroy();
header("Location: ./../../index.php?logout=true");