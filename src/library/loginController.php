<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $verify = password_verify($password, $hash);
    $fileContents = file_get_contents('');
    // echo $fileContents;
    // $adminsInfo = json_decode($fileContents,true)['users'];
    
    if ($username === '' || $password === ''){
        echo json_encode('rellenarlos');       
    } else {
    //    echo json_encode($adminsInfo);
        echo json_encode('patata');
    }