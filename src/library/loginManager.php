<?php
session_start();

require("./loginController.php");

$userJson=file_get_contents("../../resources/users.json");
$users=json_decode($userJson,true); 
$logedUserName = $users["users"][0]["name"];
$logedUserPassword = $users["users"][0]["password"];
$recivedUserName=$_POST["user"];
$recivedUserPassword=$_POST["password"];


$login=validateLoginData(
    $recivedUserName, 
    $recivedUserPassword,
    $logedUserName,
    $logedUserPassword
);
echo($login);
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

if(isset($_GET['logOut'])){
    header('Location: ../../index.php?logOut=true');
    destroySession();
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