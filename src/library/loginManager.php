<?php 
function leerUsers(){
    $file="./json/users.json";
    $Allusers= file_get_contents($file);
    return json_decode($Allusers);
}
function comprovacion(){
    if (($_POST)){
        $postUser= $_POST["username"];
        $postPassword= $_POST["password"];
        $usersAll=leerUsers();
        foreach ($usersAll as $user ) {
            if($postUser == $user->name){
                if(password_verify($user->password, $postPassword)){
                    return $user->email;
                }
            }
        }
    }
}
function iniciarSesion($postEmail){
    session_start();
    $_SESSION["email"]= $postEmail;
}
function cerrarSesion(){
    session_start();
    unset($_SESSION);
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    session_destroy();
}


?>