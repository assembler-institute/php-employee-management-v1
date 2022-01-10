<?php
session_start();

require("./loginController.php");

$userJson = file_get_contents("../../resources/users.json");
$users = json_decode($userJson,true);
$logedUserName = $users["users"][0]["name"];
$logedUserPassword = $users["users"][0]["password"];
$recivedUserName=$_POST["user"];
$recivedUserPassword=$_POST["password"];

$login = validateLoginData(
    $recivedUserName,
    $recivedUserPassword,
    $logedUserName,
    $logedUserPassword
);

switch ($login) {
    case "Loged":
        $_SESSION["loged"]=$logedUserName;
        header("Location:../dashboard.php");
        break;
    case "Wrong name and password":
        $_SESSION["WEmailPass"]="Wrong email and password";
        header("Location:../../index.php");
        break;
    case "Wrong name":
        $_SESSION["WName"]="Wrong name";
        header("Location:../../index.php");
        break;
    case "Wrong password":
        $_SESSION["WPass"]="Wrong password";
        header("Location:../../index.php");
        break;
    default:
         echo"something wrong";
        break;
}


/*function validation()
{
    {
        $json = file_get_contents('../resources/users.json');
        $json_data = json_decode($json,true);
        return $json_data;
     }



    if ($_POST["email"] === "assembler@school.com" && $_POST["pass"] === "123456") {
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["pass"] = $_POST["pass"];
        header("location:./../dashboard.php");
    } else {
        $_SESSION["loginerror"] = "You are not registered in this website";
        header("location:./../index.php?pruba=hola");
    }
}*/

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