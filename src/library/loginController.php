<?php
    require_once('loginManager.php');
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    accessAdmin($username, $password);