<?php
//todo Session activity

require "./loginManager.php";

//todo function  to manager session time
if(isset($_GET["info"])){
    //todo begin session
    session_start();
    //todo  if $_SESSION['LAST_ACTIVITY'] exists and 
    //todo LAST_ACTIVITY - actual time > 600 (10min)
    if(isset($_SESSION['LAST_ACTIVITY']) && time() - $_SESSION['LAST_ACTIVITY'] > 600){
        //todo call function to logout Session
        sessionlogout("Location:../../index.php");
    }
}
?>
