<?php
    require_once('loginManager.php');

    if (isset($_GET['action']) && $_GET['action'] === 'exit') {
        exitSession();
    } else if (isset($_GET['action']) && $_GET['action'] === 'timer') {
        exitSessionTimer();
    } else {
        userConnected();
    }