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
        header("Location:../../index.php");
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

function checkSession()
{
    // Start session
    session_start();

    $urlFile = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

    if ($urlFile == "index.php") {

        if (isset($_SESSION["email"])) {
            header("Location:./src/dashboard.php");
        } else {
            //Check for session error
            if ($alert = checkLoginError()) return $alert;

            // Check for info session variable
            if ($alert = checkLoginInfo()) return $alert;

            // Check for logout
            if ($alert = checkLogout()) return $alert;
        }
    } else {
        if (!isset($_SESSION["email"])) {
            $_SESSION["loginError"] = "You don't have permission to enter the dashboard. Please Login.";
            header("Location:../index.php");
        }
    }
}

function destroySession()
{
    // Start session
    session_start();

    // Unset all session variables
    unset($_SESSION);

    // Destroy session cookie
    destroySessionCookie();


    // Destroy the session
    session_destroy();
    header("Location:../../index.php?logout=true");
}

function destroySessionCookie()
{
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
}

// Error messages
function checkLoginError()
{
    if (isset($_SESSION["loginError"])) {
        $errorText = $_SESSION["loginError"];
        unset($_SESSION["loginError"]);
        return ["type" => "danger", "text" => $errorText];
    }
}

function checkLoginInfo()
{
    if (isset($_SESSION["loginInfo"])) {
        $infoText = $_SESSION["loginInfo"];
        unset($_SESSION["loginInfo"]);
        return ["type" => "primary", "text" => $infoText];
    }
}

function checkLogout()
{
    if (isset($_GET["logout"]) && !isset($_SESSION["email"])) return ["type" => "primary", "text" => "Logout succesful"];
}