<?php

require('loginManager.php');

$email = $_POST['email'];
$password = $_POST['password'];

if (isset($userEmail)) {
    $hasLoggedIn = logIn($email, $password);
    if ($hasLoggedIn) {
        header('Location: ../dashboard.php');
    } else {
        header('Location: ../../index.php?error=true');
    }
} else {
    $hasLoggedOut = logOut();
    header('Location: ../../index.php');
}
