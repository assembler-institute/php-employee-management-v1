<!-- This file will contain the necessary functions so that the user can log in, save their session data and log out. -->

<?php


//Start session
function login()
{
    $alert = "";
    session_start();
    $json_data = file_get_contents('../../resources/users.json');
    $data = json_decode($json_data, TRUE);
    $users = $data["users"][0];
    $email = $users["email"];
    $password = $users["password"];

    if (isset($_POST['loginMail']) && isset($_POST['loginPassword'])) {
        if ($_POST['loginMail'] === $email &&  password_verify($_POST['loginPassword'], $password)) {
            header("Location:../employee.php ");
        } else {
            echo "inside else";
            $_SESSION["loginError"] = "You don't have permission to enter the dashboard. Please Login.";

            // header("Location:../../index.php");
            header("Location:../employee.php ");
        }
    }
}



function logout()
{
    session_destroy();
}
