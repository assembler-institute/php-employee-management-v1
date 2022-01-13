<?php
require_once("./loginManager.php");

if(isset($_GET["login"])) {
        logincheck();
    }
if(isset($_GET["logout"])) {
        destroySession();
        header('Location: ../../index.php?logOut=true2');
    }
