<?php

require "loginManager.php";

//if not login ?notSession=true
function checkSession(){
    session_start();
    if (!isset($_SESSION["userLogin"])) {
        header("location: ../index.php?notSession=true");
    }};

    //finish session after 10min
    function timeSessionFinish(){
    if(isset($_SESSION["userLogin"])) {
        $currentTime = time();
        if($currentTime-$_SESSION["login_time"] > 600){
        session_destroy();
        return true;
        }
    }
}
checkSession();
timeSessionFinish();
