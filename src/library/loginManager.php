<!-- This file will contain the necessary functions so that the user can log in, save their session data and log out. -->

<?php
include("./sessionHelper.php");

function login()
{
    //Start session
    session_start();
    $json_data = file_get_contents('../../resources/users.json');
    $data = json_decode($json_data, TRUE);
    $users = $data["users"][0];
    $email = $users["email"];
    $password = $users["password"];

    if (isset($_POST['loginMail']) && isset($_POST['loginPassword'])) {
        if ($_POST['loginMail'] === $email &&  password_verify($_POST['loginPassword'], $password)) {
            header("Location:../dashboard.php ");
        } else {
            header("Location: ../../index.php?error=invaliAuth");
            exit();
        }
    }
}

function logout()
{
    session_destroy();
    header("Location:../../index.php");
}

function autoLogout()
{
    session_start();
    session_unset();
    session_destroy();
    header("Location:../../index.php?error=autoLogout");
    $_SESSION['last_activity'] = time();
}
