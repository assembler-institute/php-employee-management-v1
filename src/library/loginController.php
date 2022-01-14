<?php
require ("loginManager.php");

if (checkLogin()) {
    header("Location: ../dashboard.php"); //correct login
} else {
    header("Location: ../../index.php?error=true"); //incorrect login, ?error=true
}

//signout when clicking button signout
if (isset($_GET["signout"])) {
    endSession();
    header("Location: ../../index.php");
}

//after 10 mins location
if (timeSessionFinish()) {
    header("location: ../../index.php");
}

?>
