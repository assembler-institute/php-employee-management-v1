<?php
session_start();

function goLogin()
{
    $url = $_SERVER['REQUEST_URI'];
    if (!str_contains($url, 'index.php')) {
        header('Location: /php-employee-management-v1/index.php');
    }
}

function logout()
{
    unset($_SESSION['userId']);
    session_destroy();
    session_unset();
    goLogin();
}

$_SESSION['lifeTime'] = 5;
if (isset($_SESSION['userId'])) {
    if (time() - $_SESSION['time'] > $_SESSION['lifeTime']) {
        logout();
    } else {
        $url = $_SERVER['REQUEST_URI'];
        if (str_contains($url, 'index.php')) {
            header('Location: /php-employee-management-v1/src/dashboard.php');
        }
    }
} else {
    goLogin();
}
