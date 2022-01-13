<?php
session_start();
if (!isset($_SESSION["user"])) {
    
    header("location:./../index.php?notlogged=1");
}
//comment this line if you want to stop timeout
//time() is a function that defines the total time until today, we discount the session time logged, a
//and we have the actual time we stay in session

//if(time()-$_SESSION["login_time"]>=50){
//    header("location:./library/loginController.php?timeout");
//}
