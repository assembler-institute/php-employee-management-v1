<?php


function logIn(){
    $dataUser = file_get_contents('./../../resources/users.json');//acces to JSON users.json
    $usermail = $_POST['usermail'];
    $password = $_POST['password'];
    $data = json_decode($dataUser, true); //recoger array de users.json
    $admin = $data['users'][0]; //acceder al objeto userId=1 (es una array)
    if ($admin['email'] == $usermail && password_verify($password , $admin['password'])) {
        echo 'tiene acceso';
        session_start();
        $_SESSION['user'] = $admin['name'];
        $_SESSION["login_time"] = time(); 
        header("location: ../dashboard.php");
    } else {
            header("location: ./../../index.php?fail=1");
    }

}

    function logout(){
        session_start();
        $_SESSION=array(); //destroy all of the session variables
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_id(), '', time() - 3600,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    session_destroy();
    header("location: ./../../index.php");
    }


