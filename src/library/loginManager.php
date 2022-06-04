<?php
//Validate Session
function validate(){
    
    $users = json_decode(file_get_contents('../../resources/users.json'), true);
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    session_start();

    if($email === $users['users'][0]['email']){

        if(password_verify($pass, $users['users'][0]['password'])){

            session_start();

            $_SESSION['email'] = $email;
            $_SESSION['pass'] = $pass;
            // include('./sessionHelper.php');
            // initCountDown();
            header ("Location: ../dashboard.php");
        }else {
            $_SESSION['loginerror'] = 'Incorrect Password';

            header ("Location: ../../index.php");
        }

    }else {
        $_SESSION['loginerror'] = 'Incorrect Email';

        header ("Location: ../../index.php");
    }

}   


//Check Session
function checkSession(){

    session_start();

    $urlFile = basename($_SERVER['REQUEST_URI'],'?'.$_SERVER['QUERY_STRING']);

    if($urlFile === 'index.php') {
        if(isset($_SESSION['email'])) {

            header ("Location: ../dashboard.php");

        }else {
            if($errorLog = checkLoginError()){
                return $errorLog;
            }
            if($errorLog = checkLoginOut()){
                return $errorLog;
            }
                return $errorLog = '';
        }
    }
}

//logOut session
function logoutSession() {
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

header("Location:../../index.php?logout=true");
}

//Check Login error
function checkLoginError(){

    if(isset($_SESSION['loginerror'])) {
        return "<p>".$_SESSION['loginerror']."</p>";
    }
}

//Check Logout
function checkLoginOut(){

    if(isset($_GET['logout']) && !isset($_SESSION['email'])){
        return "<p>Logout successfully</p>";
    }
}