<?php


//! Functions
function sesssioncheck($name,$password, $path){
    $file = $path;
    $Allusers = file_get_contents($file);
    $usersAll = json_decode($Allusers);
    $userName = $usersAll->users;
    foreach ($userName as $user) {
        if ($name == $user->email) {
            echo "he entrado 1";
            $compare = $user->password;
            if (password_verify($password, $user->password)) {
                session_start();
                $_SESSION['LAST_ACTIVITY'] = time();
                $_SESSION["email"] = $name;
                $_SESSION["password"] = $password;
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
?>
