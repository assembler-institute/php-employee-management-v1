<?php
require_once("./loginManager.php");

    session_start();


    $jsonUser = file_get_contents("../../resources/users.json");
    $obj = json_decode($jsonUser);

    $emailDB = $obj->users[0]->email;
    $paswordDB = $obj->users[0]->password;


    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $_SESSION['last_access'] = time();

if (password_verify($pass, $paswordDB) && $email == $emailDB){
    header("Location:../dashboard.php");
}
else{
    // poner un alert o un pop up!
    header("Location:../../index.php?flag=1");
}
