<?php
require_once "./loginManager.php";

$file="../../resources/users.json";
$Allusers= file_get_contents($file);
$usersAll= json_decode($Allusers);
$userName= $usersAll -> users;
// print_r($usersAll -> users);

if (($_POST)){
    $postEmail= $_POST["email"];
    $postPassword= $_POST["password"];
    // header(("Location:../index.php?InvalidPassword"));
    foreach ($userName as $user ) {
        // print_r($user[0]);
        // print_r($user->name);
        if($postEmail == $user -> email){
            echo "he entrado 1";
            $compare= $user->password;
            if(password_verify($postPassword, $user->password)){
                echo "He entrado 2";
                session_start();
                $_SESSION["email"]= $postEmail;
                $_SESSION["password"]=$postPassword;
                header("Location:../dashboard.php");
                // exit();
            }
        }
    }
}

if(isset($_POST["logout"])){
    sessionlogout();
}