<?php
function validateLoginData($launchUser, $launchPassword, $logedUser, $logedPassword){


    switch (true) {
        case ($launchUser == $logedUser && password_verify($launchPassword,$logedPassword)):
                return "Loged";
                break;
        case (($launchUser != $logedUser) && !password_verify($launchPassword,$logedPassword)):
                return "Wrong name and password";
                break;
        case (!($launchUser == $logedUser)):
                return "Wrong name";
                break;
        case (!password_verify($launchPassword,$logedPassword)):
                return "Wrong password";
                break; 
        default:
                break;
    }
}

function startSession()
{
        $_SESSION["login_time"] = time();
        header("Location:../dashboard.php");
}