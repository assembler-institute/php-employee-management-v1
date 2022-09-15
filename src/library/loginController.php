<?php 
    require_once('src\library\loginManager.php');
    
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    echo accessUser($username, $pass);
