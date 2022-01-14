<?php


function logIn(){
    $dataUser = file_get_contents('./../../resources/users.json');//access to JSON users.json
    $usermail = $_POST['usermail'];
    $password = $_POST['password'];
    $data = json_decode($dataUser, true); //pick array of users.json
    $admin = $data['users'][0]; //access to user.json, in echo appears like $data(entire json)->object(users)->array[object 1]
    //if email don't pass, he back up to  header, indicating that the email is not correct
    if ($admin['email'] == $usermail) {
        //if email is correct, goes to other if, checking the pass, if it's correct, continue, if not, comeback to index passing get value
        if( password_verify($password , $admin['password'])){
            session_start();
            $_SESSION['user'] = $admin['name'];
            $_SESSION["login_time"] = time(); 
            header("location: ../dashboard.php");
        }else{
            header("location: ./../../index.php?fail=pass");
        }
    } else {
            header("location: ./../../index.php?fail=email");
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
    unset($_SESSION["login_time"]);
    session_destroy();
    header("location: ./../../index.php?logout");
    }


