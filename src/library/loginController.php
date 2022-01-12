<?php
require_once("./loginManager.php");
require_once("./library/sessionHelper.php");
if(isset($_POST["logout"]) || isset($_GET["timeout"])){
    logout();
}
if(isset($_POST["usermail"]) && isset($_POST["password"]) ) {
    logIn();
}
