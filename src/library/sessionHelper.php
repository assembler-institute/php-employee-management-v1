<?php

  //$urlFile = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);     //dashboard.php
   //$urlFile = basename($_SERVER['QUERY_STRING']);                                   //login=true
   //$urlFile = basename($_SERVER['REQUEST_URI']);                                    //dashboard.php?login=true

   
   function checkSession() {

    session_start(); 
 
    $urlFile = basename($_SERVER['REQUEST_URI']);                                   
 
    if(($urlFile == "dashboard.php?login=true")) {
 
    //Check the session start time is set or not
    if(!isset($_SESSION['start']))
    {
        //Set the session start time
        $_SESSION['start'] = time();
    }
 
    //Check the session is expired or not
    checkTime();
   
   }
 }

 function checkTime(){
 if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 10)) {
  logOut();
  echo "Session is expired.<br/>";
  header("Location: ../index.php?logout");
}
else
  echo "Current session exists.<br/>";

}

function logOut(){
  session_start(); 
  destroySessionCookie();
  session_unset();
  session_destroy();
  header("Location: ../index.php?logout");
}
