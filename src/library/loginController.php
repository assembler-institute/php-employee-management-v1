<?php
    session_start();

    $jsonUser = file_get_contents("../../resources/users.json");
    $obj = json_decode($jsonUser);
    print_r($obj);
    echo "<br>";

    $emailDB = $obj->users[0]->email;
    echo $emailDB;
    $paswordDB = $obj->users[0]->password;
    echo "<br>";
    echo $paswordDB;
    echo "<br>";
    // LIMPIA ESTOOOOOOOO!!!!!!!!!!!!!!!!!!!!!!!


    $email = $_POST["email"];
    $pass = $_POST["pass"];
    echo $email;
    echo "<br>";
    echo $pass;
    echo "<br>";

    if (password_verify($pass, $paswordDB) && $email == $emailDB){
        header("Location:../dashboard.php");
    }
    else{
        // poner un alert o un pop up!
        header("Location:../../index.php");
    }
