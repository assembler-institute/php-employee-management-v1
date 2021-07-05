<?php
require("./loginManager.php");
$userJson=file_get_contents("../../resources/users.json");
$users=json_decode($userJson,true); 
$logedUserName = $users["users"][0]["name"];
$logedUserPassword = $users["users"][0]["password"];
$recivedUserName=$_POST["user"];
$recivedUserPassword=$_POST["password"];

//echo nl2br("$userName\n$userPassword\n$logedUserName\n$logedUserPassword\n");
validateLoginData(
    $recivedUserName, 
    $recivedUserPassword,
    $logedUserName,
    $logedUserPassword
);
// foreach($users as $user){
//     echo print_r ($user[0]["name"]);
// }

