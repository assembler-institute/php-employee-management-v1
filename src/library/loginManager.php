<?php
    function authUser($email, $pass){
        
        $userJson = file_get_contents("../../resources/users.json");
        $userData = json_decode($userJson, true);

        if($email == $userData["users"][0]["email"] && password_verify($pass, $userData["users"][0]["password"])){
            session_start();

            $_SESSION["email"] = $email;
            $_SESSION["name"] = $userData["users"][0]["name"];
            $_SESSION["expTime"] = 10;
            $_SESSION["time"] = time();
            
            header("Location:../dashboard.php");
        }
        else{
            session_start();

            $_SESSION["wrongLogin"] = "Wrong email or password!";
            header("Location:../../index.php");
        }
    }

    function logOut(){
        session_start();
        unset($_SESSION);
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header("Location:../../index.php?logout");
    }