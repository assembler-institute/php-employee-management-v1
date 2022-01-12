<?php 
function leerUsers(){
    $file="../../resources/users.json";
    $Allusers= file_get_contents($file);
    $usersAll=json_decode($Allusers);
    return $usersAll;
}
function comprovacion(){
    if (($_POST)){
        $postUser= $_POST["username"];
        $postPassword= $_POST["password"];
        $usersAll=leerUsers();
        foreach ($usersAll as $users ) {
            foreach($users as $user){
                if($postUser == $user->name){
                    // return password_verify( $postPassword,$user->password);
                    if(password_verify( $postPassword,$user->password)){
                        return $user->email;
                    }
                    else return false;
                }
            }
        }
        return false;
    }
}
function iniciarSesion($postEmail){
    session_start();
    $_SESSION['LAST_ACTIVITY'] = time(); 
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