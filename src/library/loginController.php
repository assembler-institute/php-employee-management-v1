<?php
session_start();

require("./loginManager.php");
$userJson=file_get_contents("../../resources/users.json");
$users=json_decode($userJson,true); 
$logedUserName = $users["users"][0]["name"];
$logedUserPassword = $users["users"][0]["password"];
$recivedUserName=$_POST["user"];
$recivedUserPassword=$_POST["password"];

//echo nl2br("$userName\n$userPassword\n$logedUserName\n$logedUserPassword\n");
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
        header("Location:./sessionHelper.php?starting=start");
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
        # code...
        break;
}


// foreach($users as $user){
//     echo print_r ($user[0]["name"]);
// }

