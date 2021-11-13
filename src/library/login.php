<?php
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

    // var_dump($usersData['users'][0]['name']);
    echo $usersData['users'][0]['name'];


    if ($usersData['users'][0]['name'] === $username && password_verify($password, $usersData['users'][0]['password'])) {
        $_SESSION["name"] = $username;
        header("Location: ./../dashboard.php?loginSuccess");
        exit;
    } else {
        echo "false";
        header("Location: ./../../index.php?incorrectpass");
        exit;
    }
    
?>