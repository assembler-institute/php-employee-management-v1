<?php
function loginAuth($email, $pass)
{
    if (session_status() == PHP_SESSION_NONE) session_start();

    $users = getUser();

    foreach ($users as $user) {
        if ($user['email'] == $email && password_verify($pass, $user['password'])) {
            return $user;
        }
    }
}

function getUser()
{
    $userJSON = file_get_contents(dirname(__DIR__, 2) . '/resources/users.json');
    return json_decode($userJSON, true)['users']; //[0]['name']
}

function getUserById($id)
{
    $users = getUser();
    foreach ($users as $user) {
        if ($user['userId'] == $id) return $user;
    }
}

function destroySession()
{
    // Start session
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    unset($_SESSION);

    // Destroy session cookie
    destroySessionCookie();

    // Destroy the session
    session_destroy();
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
