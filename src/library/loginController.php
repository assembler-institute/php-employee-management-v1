<?php

require('loginManager.php');

$userEmail = $_POST['emailInput'];
$passwordEmail = $_POST['passwordInput'];

if (isset($userEmail)) {
    $hasLoggedIn = logIn($userEmail, $passwordEmail);
    if ($hasLoggedIn) {
        header('Location: ../dashboard.php');
    } else {
        header('Location: ../../index.php?error=true');
    }
} else {
    $hasLoggedOut = logOut();
    header('Location: ../index.php');
}
