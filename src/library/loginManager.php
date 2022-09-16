<?php

/* This file will contain the necessary functions so that the user can log in, 
save their session data and log out. */

session_start();

function login(){

$usersJson = file_get_contents('../../resources/users.json');
$decodedJson = json_decode($usersJson, true);
$users = $decodedJson["users"];

foreach ($users as $user) {
    $userEmail = $user["email"];
    $pwdCrypt = $user["password"];
}

$pwdUser = "123456";
$pwdVerify = (password_verify($pwdUser, $pwdCrypt)); // 1 or 0

if (isset($_POST["login"])) {
    if ($_POST["user-email"] === $userEmail && $_POST["user-password"] === $pwdUser) {
        if ($pwdVerify) {
            header("Location: ../dashboard.php");
        }
    } else {
        header("Location: ../../ini.php");
        // disparar alerta
    }
}

}

