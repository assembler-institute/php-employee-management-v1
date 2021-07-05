<?php
require_once "loginManager.php";

$email = $_POST['email'];
$pass = $_POST['password'];

if (loginAuth($email, $pass)) {
    $user = loginAuth($email, $pass);
    session_start();
    $_SESSION['authUserId'] = $user['userId'];
    header("Location: ../dashboard.php");
} else {
    header("Location: ../../index.php");
}
