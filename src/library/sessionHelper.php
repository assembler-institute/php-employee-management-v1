<?php
    require_once('loginManager.php');

    if (isset($_GET['action']) && $_GET['action'] === 'exit') {
        exitSession();
    }else {
        userConnected();
    }