<?php
require "./loginManager.php";
if(isset($_GET["info"])){
    session_start();
    if(isset($_SESSION['LAST_ACTIVITY']) && time() - $_SESSION['LAST_ACTIVITY'] >600){
        sessionlogout("Location:../../index.php");
    }
}
?>
