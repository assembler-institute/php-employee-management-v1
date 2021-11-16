<?php
//crear las funciones, start session and validate
if (!isset($_SESSION)) {
    session_start();
}

function validateLogin($logUser, $logPassword)
{
    $user = file_get_contents("../../resources/users.json");
    $result = json_decode($user, true);
    $userEmail = $result["users"][0]["email"];
    $userPassword = $result["users"][0]["password"];
    $userId = $result["users"][0]["userId"];

    if ($logUser === $userEmail && password_verify($logPassword, $userPassword)) {
        $_SESSION["lastLogin_timeStamp"] = time();
        $_SESSION["userId"] = $userId;
        header("Location: ../dashboard.php?login=success");
        //contador de tiempo del usuario
    } else {
        header("Location: ../../index.php?invalidData");
        exit();
    }
}

