<?php
require_once "./loginManager.php";

$file = "C:/xampp/htdocs/PHP/php-employee-management-v1/resources/employees.json";
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
                echo "He entrado 2";
                session_start();
                $_SESSION["email"] = $postEmail;
                $_SESSION["password"] = $postPassword;
                header("Location:../dashboard.php");
            }
        }
    }
}

if (isset($_POST["logout"])) {
    sessionlogout();
}
