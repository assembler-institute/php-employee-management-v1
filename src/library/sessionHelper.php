<?php

require('loginManager.php');

session_start();

if (isset($_SESSION['userId'])) {
    if (time() - $_SESSION['time'] > $_SESSION['lifeTime']) {
        logout();
    }
} else {
    header('Location: ../../index.php');
}
