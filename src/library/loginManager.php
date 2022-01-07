<?php
function authUser()
{
    // Start session
    session_start();

    // Get form input values
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    // Now we should look for this values in a database
    // Instead we'll use static vars
    if (checkUser($email, $pass)) {
        // we usually save in a session variable user id and other user data like name, surname....
        $_SESSION["email"] = $email;
        // when we check that the email and password is correct, we redirect the user to the dashboard 
        header("Location:../dashboard.php");
    } else {
        $_SESSION["loginError"] = "Wrong email or password!";
        header("Location:../index.php");
    }
}

function checkUser(string $email, string $pass)
{
    $str = file_get_contents('../../resources/users.json');
    $json = json_decode($str, true); // decode the JSON into an associative array

    $emailDb = $json['users'][0]['email'];
    $passDb = $json['users'][0]['password'];

    // check if email and password are correct
    if ($email == $emailDb && password_verify($pass, $passDb)) return true;
    else return false;
    // https://stackoverflow.com/questions/19758954/get-data-from-json-file-with-php
}

