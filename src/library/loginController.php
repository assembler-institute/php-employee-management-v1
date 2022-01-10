<?php
require_once("./loginManager.php");
if(isset($_POST["logout"])){
    logout();
}
if(isset($_POST["usermail"]) && isset($_POST["password"]) ) {
    logIn();
}
