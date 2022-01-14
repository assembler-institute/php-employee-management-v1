<?php

//Verify passwords and log in
function checkLogin(){
session_start();
$file = 'D:/XAMPP/htdocs/Employee-management-V1/php-employee-management-v1-1/resources/users.json';
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

//finish the current session
function endSession() {
    session_start();
    session_destroy();
}

//finish session after 10min
function timeSessionFinish(){
    if(isset($_SESSION["userLogin"])) {
        session_start();
        $currentTime = time();
        if($currentTime-$_SESSION["login_time"] > 10){
        session_destroy();
        return true;
        }
    }
};
?>