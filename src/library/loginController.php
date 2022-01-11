<?php

require_once("./loginManager.php");

//control login

if ($_GET["login"]==="true") {
    readAllUsers($_POST["email"], $_POST["password"]);
} else{
    session_start();
    logout($_SESSION["login"]);
}

?>