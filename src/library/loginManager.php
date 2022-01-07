<?php
session_start();

function checkSession()
{
    if (!isset($_SESSION["email"])) {
        $_SESSION["loginerror"] = "You cannot access without login";
        header("location:./index.php");
    }
}

function checkLogOut()
{
    if (!isset($_SESSION)) {
        "<div class='alert alert-success' role='alert' style='margin-top: 10px;'>Logged out!</div>";
    }
}

function checkErrors()
{
    if (isset($_SESSION["loginerror"])) {
        $error = $_SESSION["loginerror"];
        echo "<div class='alert alert-danger' role='alert' style='margin-top: 10px;'>", $error, "</div>";
        unset($_SESSION["loginerror"]);
    }
}

function validation()
{
    if ($_POST["email"] === "assembler@school.com" && $_POST["pass"] === "123456") {
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["pass"] = $_POST["pass"];
        header("location:./../src/dashboard.php");
    } else {
        $_SESSION["loginerror"] = "You are not registered in this website";
        header("location:./../index.php");
    }
}

function deleteSession()
{
    unset($_SESSION);
    // destroy session cookie
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
    header("location:./../index.php");
}