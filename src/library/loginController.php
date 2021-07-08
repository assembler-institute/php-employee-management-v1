<?php
include_once "./sessionHelper.php";

switch ($_SERVER["REQUEST_METHOD"]) {
    case "LOGOUT":
        logout();
        break;
}