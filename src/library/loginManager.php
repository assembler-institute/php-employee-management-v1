<?php 

    function getJsonUser(){
        //return json file
        return file_get_contents("../../resources/users.json");
    }

    function getAllUsers(){
        $decode_json = json_decode(getJsonUser());
        return $decode_json->users;
    }

    function readAllUsers($email, $password){
        //lifetime -> 600s = 10min
        session_set_cookie_params(600);
        //session para guardar id del usuario
        session_start();
        foreach(getAllUsers() as $user){
            if(password_verify($password, $user->password) && $email === $user->email){
                //success
                $logedUser = array("email" => $user->email, "password" => $user->password);
                $_SESSION["login"] = $logedUser;
                header("Location: ../dashboard.php");
                exit();
            }
        };
        $_SESSION["login"] = "failed";
        header("Location: ../../index.php");
    }
    
?>