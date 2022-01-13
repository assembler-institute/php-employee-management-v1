<?php
require_once "./loginManager.php";

$file = "../../resources/users.json";
$Allusers = file_get_contents($file);
$usersAll = json_decode($Allusers);
$userName = $usersAll->users;

if (($_POST)) {
    $postEmail = $_POST["email"];
    $postPassword = $_POST["password"];
    foreach ($userName as $user) {
        if ($postEmail == $user->email) {
            echo "he entrado 1";
            $compare = $user->password;
            if (password_verify($postPassword, $user->password)) {
                // echo "He entrado 2";
                // ini_set("session.gc_maxlifetime", "1000");
                session_start();
                $_SESSION['LAST_ACTIVITY'] = time();
                $_SESSION["email"] = $postEmail;
                $_SESSION["password"] = $postPassword;
                // time() - 10000000
                // session_set_cookie_params(10);
                header("Location:../dashboard.php");
            }
        }
    }
}

if (isset($_POST["logout"])) {
    sessionlogout("Location:../../index.php");
}
?>