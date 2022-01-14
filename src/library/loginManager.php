<?php


//! Functions
function checkUser($path){
    $file = $path;
  $Allusers = file_get_contents($file);
$usersAll = json_decode($Allusers);
$userName = $usersAll->users;
$postEmail= $_POST["email"];
$postPassword = $_POST["password"];
    foreach ($userName as $user) {
        if ($postEmail == $user->email) {
            echo "he entrado 1";
            $compare = $user->password;
            if (password_verify($postPassword, $user->password)) {
                session_start();
                $_SESSION['LAST_ACTIVITY'] = time();
                $_SESSION["email"] = $postEmail;
                $_SESSION["password"] = $postPassword;
                header("Location:../dashboard.php");
            }
        }
    }
}

function sessionlogout($path)
{
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
    header($path);
}
