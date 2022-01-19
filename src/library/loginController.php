<?php
require ("loginManager.php");

function checkSession(){
    if (!isset($_SESSION["userLogin"])) {
        header("location: ../../index.php?notSession=true");
    }}

if (checkLogin()) {
    header("Location: ../dashboard.php"); //correct login
} else {
    header("Location: ../../index.php?error=true"); //incorrect login
}

//signout when clicking button signout
if (isset($_GET["signout"])) {
    endSession();
    header("Location: ../../index.php");
}

if (timeSessionFinish()) {
    header("location: ../../index.php");
}

?>
