<?php
require_once "loginManager.php";

if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_SESSION['authUserId'])) {
    $savedTime = $_SESSION["lastLogin_timeStamp"];
    $now = time();
    $elapsedTime = $now - $savedTime;

    if ($elapsedTime >= 600) {
        destroySession();
    } else {
        $_SESSION["lastLogin_timeStamp"] = $now;
    }
}
