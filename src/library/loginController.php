<!-- This file will handle the user's HTTP requests when they want to log in or log out, therefore, it must call the functions of the "loginManager.php" once the request has been received to carry out the action.
-->
<?php
require_once("./loginManager.php");

if(isset($_GET["login"])) {
        logincheck();
    }
if(isset($_GET["logout"])) {
        destroySession();
        header('Location: ../../index.php?logout');
    }
