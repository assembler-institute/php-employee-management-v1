<?php
require_once("./loginManager.php");

// Start session
session_start();

if ($_SESSION['last-connection']) {
    $now = time();
    $difference = $now - $_SESSION['last-connection'];

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    if ($difference >= 5) {
        destroySession();
    }
} else {
    $now = time();
    $_SESSION['last-connection'] = $now;
}

die;
