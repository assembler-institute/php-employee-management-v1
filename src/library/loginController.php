<?php
require_once("./loginManager.php");

if(isset($_GET["login"])){
    authUser();
}

if(isset($_GET["logout"])){
    destroySession();
};
