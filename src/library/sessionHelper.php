<?php
require "./loginManager.php";
if(isset($_GET["info"])){
    // echo "pepe";
    session_start();
    if(isset($_SESSION['LAST_ACTIVITY']) && time() - $_SESSION['LAST_ACTIVITY'] > 600){
        // echo "pepe";
        sessionlogout("Location:../../index.php");
    }
}
?>
