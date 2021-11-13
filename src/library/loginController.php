<?php
require_once("./loginManager.php");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    login();
} elseif ($method == 'GET') {
    logout();
}