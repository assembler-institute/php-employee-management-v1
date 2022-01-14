<?php
require_once "./loginManager.php";


if (isset($_POST["submitLogin"])) {
    $path = "../../resources/users.json";
    checkUser($path);
}

if (isset($_POST["logout"])) {
    sessionlogout("Location:../../index.php");
}
?>