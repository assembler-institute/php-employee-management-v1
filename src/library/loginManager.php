<?php
//acces to JSON users.json
$dataUser = file_get_contents('./../../resources/users.json');


session_start();
$usermail = $_POST['usermail'];
$password = $_POST['password'];


    $data = json_decode($dataUser, true); //recoger array de users.json
    $admin = $data['users'][0]; //acceder al objeto userId=1 (es una array)
    if ($admin['email'] == $usermail && password_verify($password , $admin['password'])) {
        echo 'tiene acceso';
        $_SESSION['usermail'] = $usermail;
        header("location: ../dashboard.php");
    } else {
        header("location: ./../../index.php");
    }



