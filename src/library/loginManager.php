<?php

$file = 'D:/XAMPP/htdocs/Employee management V1/php-employee-management-v1-1/resources/users.json';
$data = file_get_contents($file);
$result = json_decode($data, true);

$userSaved = $result["users"][0]["email"];
$passwordSaved = $result["users"][0]["password"];

$userLogin = $_POST["nameLogin"];
$passwordLogin = $_POST["namePassword"];

$passwordHashed = password_hash($passwordLogin, PASSWORD_DEFAULT);

if (password_verify($passwordLogin, $passwordSaved)) {
    session_start();
    $_SESSION["userLogin"] = $userLogin;
    $_SESSION['login_time'] = time();
    header("location: ../dashboard.php");
} else {
    echo "<h1>El usuario o la contraseña son incorrectos<h1><br>
            <a href='../../index.php' >Pulsa para volver al log in</a>";
}
**
function endSesion() {
    session_start();
    unset ($_SESSION["userLogin"]);
    header("location: ../index.php");
}
?>
