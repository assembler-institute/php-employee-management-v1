<?php

function login() {
    session_start();

    if(empty($_POST["username"]) || empty($_POST["password"])) {
        header("Location: ./../../index.php?notLogin");
        exit;
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
    }

    $usersJsonFile = "./../../resources/users.json";

    if(file_exists($usersJsonFile )) {
        $jsonData = file_get_contents($usersJsonFile );
        $usersData = json_decode($jsonData, true);
    }

    foreach ($usersData as $users) {
        foreach ($users as $user) {
            if ($user['name'] === $username && password_verify($password, $user['password'])) {
                $_SESSION["name"] = $username;
                header("Location: ./../dashboard.php?loginSuccess");
                exit;
            } else {
                echo "false";
                header("Location: ./../../index.php?incorrectpass");
                exit;
            }
        }
    }
}


function logout() {
    session_start();

    unset($_SESSION['name']);
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            "",
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httpOnly"],
        );
    }

    session_destroy();
    header("Location: ./../../index.php?logout=true");
}