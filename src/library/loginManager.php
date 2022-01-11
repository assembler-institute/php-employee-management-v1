<?php

$file = 'D:/XAMPP/htdocs/Employee management V1/php-employee-management-v1-1/resources/users.json';
$data = file_get_contents($file);
$result = json_decode($data, true);

$userSaved = $result["users"][0]["email"];
$passwordSaved = $result["users"][0]["password"];

$userLogin = $_POST["nameLogin"];
$passwordLogin = $_POST["namePassword"];

$passwordHashed = password_hash($passwordLogin, PASSWORD_DEFAULT);

echo ($passwordHashed); echo ('<br>');
echo ($passwordSaved); echo ('<br>');
echo ($passwordLogin); echo ('<br>');

if (password_verify($passwordSaved, $passwordHashed)) {
    session_start();
    $_SESSION["userLogin"] = $userLogin;
    header("location: ../employee.php");
} else {
    echo "El usuario o la contraseña son incorrectos";
}


?>
