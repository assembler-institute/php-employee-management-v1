<?php
session_start();

//require("./loginController.php");

function logincheck() {

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
}


/*if(isset($_GET['logOut'])){
    header('Location: ../../index.php?logOut=true2');
    destroySession();
}*/




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

function destroySession()
{
    session_start();
    unset($_SESSION);
    destroySessionCookie();
    session_destroy();
}

function destroySessionCookie()
{
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 10,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
}

function validateLoginData($launchUser, $launchPassword, $logedUser, $logedPassword){


    switch (true) {
        case ($launchUser==$logedUser && password_verify($launchPassword,$logedPassword)):
                return "Loged";
                break;
        case (($launchUser!=$logedUser) && !password_verify($launchPassword,$logedPassword)):
                return "Wrong name and password";
                break;
        case (!($launchUser==$logedUser)):
                return "Wrong name";
                break;
        case (!password_verify($launchPassword,$logedPassword)):
                return "Wrong password";
                break; 
        default:
                break;
    }
}