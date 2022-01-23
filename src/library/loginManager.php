<?php

//Verify passwords and log in
function checkLogin(){
session_start();
$file = '../../resources/users.json';
$data = file_get_contents($file);
$result = json_decode($data, true);

$userSaved = $result["users"][0]["email"];
$passwordSaved = $result["users"][0]["password"];

$userLogin = $_POST["nameLogin"];
$passwordLogin = $_POST["namePassword"];

$passwordHashed = password_hash($passwordLogin, PASSWORD_DEFAULT);

if (password_verify($passwordLogin, $passwordSaved)) {
    $_SESSION["userLogin"] = true;
    $loginTime = time();
    $_SESSION['login_time'] = $loginTime;
    return true;
} else {
    $_SESSION["errorLogin"] = 'error';
    return false;
}}

//finish the current session function
function endSession() {
    session_start();
    session_destroy();
}
?>