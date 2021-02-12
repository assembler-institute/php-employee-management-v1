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
            $matchResult = true;
        } else {
            $matchResult = false;
        }
    }
    return $matchResult;
}

function saveSession() {

}

function logout() {

}
