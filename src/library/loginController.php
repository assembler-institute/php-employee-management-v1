<?php
require_once "loginManager.php";

$email = $_POST['email'] ?? '';
$pass = $_POST['password'] ?? '';
$action = $_POST['action'] ?? '';

/**
 * Logout
 */
if ($action == 'logout') {
    destroySession();
    header('Location:../../index.php');
    exit;
}

/**
 * Login
 */
if ($action == 'login') {
    if (loginAuth($email, $pass)) {
        $user = loginAuth($email, $pass);
        if (session_status() == PHP_SESSION_NONE) session_start();
        $_SESSION['authUserId'] = $user['userId'];
        $_SESSION['lastLogin_timeStamp'] = time();

        echo json_encode(['message' => 'correct user']);
        http_response_code(200);

        exit;
    } else {
        $failure = [
            'message' => 'Password or email is incorrect',
        ];
        echo json_encode($failure);
        http_response_code(401);
        exit;
    }
}
