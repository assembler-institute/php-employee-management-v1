<!-- This file will contain the necessary functions so that the user can log
in , save their session data and log out . -->

<?php

function validateUser($userEmail, $userPassword) {
    //String of JSON format
    $jsonUser = file_get_contents("../../resources/users.json");

    //Array of JSON format
    $users = json_decode($jsonUser, true);

    //Access each user within JSON "users" array
    foreach ($users["users"] as $user) {
        //Match email and verify password matches a hash
        if($user["email"] === $userEmail && password_verify($userPassword, $user["password"])) {
            $matchCredentials = true;
            saveSession($user);
            echo'<pre>';
            print_r($_SESSION);
        } else {
            $matchCredentials = false;
        }
    }
    return $matchCredentials;
}

function saveSession($user) {
    session_start();
    //Create session variables
    $_SESSION["userId"] = $user["userId"];
    $_SESSION["name"] = $user["name"];
    $_SESSION["password"] = $user["password"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["time"] = time();
    $_SESSION["lifeTime"] = 600;
}

function logout($error) {
    session_start();
    session_destroy();

    if($error === "Session expired!") {
        $url = "../index.php";
        header('Location: ' . $url . "?error=Session expired!");
        exit();
    }
    if($error === "Session closed!") {
        return $error;
    }
}
