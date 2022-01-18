<?php
//Check session
function logIn()
{
    $userObject = file_get_contents("../../resources/users.json");
    $json = json_decode($userObject, true);
    $user = $_POST["login-name"];
    $pass = $_POST["login-pass"];

    $userCheck = userCheck($user, $json["users"]);
    if ($userCheck !== null) {
        passCheck($userCheck, $pass);
        print_r($userCheck);
    } else {
        print_r($userCheck);
        header("Location: ../../index.php?error");
    }
}

function userCheck($user, $json)
{
    
    foreach ($json as $object) {

        $check = in_array($user, $object);
        if ($check === true) {
            return $object;
        }
    }
}

function passCheck($userArray, $pass)
{
    $arrayPass = $userArray["password"];
    $passCheck = password_verify($pass, $arrayPass);
    if ($passCheck === true) {
        $inactive = 600;
        ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 10m
        session_start();
        $_SESSION["user"] = $userArray["name"];
        header("Location: ../dashboard.php");
    } else {
        header("Location: ../../index.php?error");
    }
}

//Close the open session
function logout() {
    session_start();

    $_SESSION = array();

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

    session_destroy();

    header("Location: ../../index.php");
}

function sessionCheck()
{
    session_start();
    if (!isset($_SESSION["user"])) {
        header("Location: ../index.php?notLogged");
    }
}

function indexLogCheck()
{
    session_start();
    if (isset($_SESSION["user"])) {
        header("Location: ./src/dashboard.php");
    }
}

//expired session after inactive time
function outOfTime() {
    $inactive = 600; 

    if (isset($_SESSION['expire']) && (time() - $_SESSION['expire'] > $inactive)) {
        session_start();

        $_SESSION = array();

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

        session_destroy();

        header("Location: ../index.php?notLogged");
    }
}

