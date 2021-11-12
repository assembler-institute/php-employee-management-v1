<!-- 
This file will check that the user session is still active and if not,
you must call the corresponding function of "loginManager.php" to logout the user.
In the event that the user remains more than 10 minutes in the session, the user will have to be logged out. -->
<?php
require_once "./loginManager.php";

if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_SESSION['userId'])) {
    $savedTime = $_SESSION["lastLogin_timeStamp"];
    $now = time();
    $elapsedTime = $now - $savedTime;
    if ($elapsedTime >= 5) {
        destroySession();
    } else {
        $_SESSION["lastLogin_timeStamp"] = $now;
    }
}
?>

