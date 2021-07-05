<?php

function loginAuth($email, $pass)
{
    session_start();

    $users = getUser();

    foreach ($users as $user) {
        if ($user['email'] == $email && password_verify($pass, $user['password'])) {
            return $user;
        }
    }
}

function getUser()
{
    $userJSON = file_get_contents('../../resources/users.json');
    return json_decode($userJSON, true)['users']; //[0]['name']
}
