<?php
session_start();

require("./loginManager.php");

$userJson = file_get_contents("../../resources/users.json");
$users = json_decode($userJson, true);
$loggedUserName = $users["users"][0]["name"];
$loggedUserPassword = $users["users"][0]["password"];
$recivedUserName = $_POST["user"];
$recivedUserPassword = $_POST["password"];

$login = validateLoginData(
    $recivedUserName,
    $recivedUserPassword,
    $loggedUserName,
    $loggedUserPassword
);

// Setting variables depending on login contexts
switch ($login) {
    case "Logged":
        $_SESSION["loggedUsername"] = $loggedUserName;
        header("Location:./sessionHelper.php?login=true");
        break;
    case "Wrong name and password":
        $_SESSION["wrongEmailPass"] = "Wrong email and password";
        header("Location:../../index.php");
        break;
    case "Wrong name":
        $_SESSION["wrongName"] = "Wrong name";
        header("Location:../../index.php");
        break;
    case "Wrong password":
        $_SESSION["wrongPass"] = "Wrong password";
        header("Location:../../index.php");
        break;
    default:
        echo "Something went wrong";
        break;
}
