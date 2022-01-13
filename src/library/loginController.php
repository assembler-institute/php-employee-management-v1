<?php
require ("loginManager.php");

if (checkLogin()) {
    header("location: D:/XAMPP/htdocs/Employee management V1/php-employee-management-v1-1/src/dashboard.php"); //correct login
} else {
    header("location: ../../index.php?error=true"); //incorrect login
}

//signout when clicking button signout
if (isset($_GET["signout"])) {
    endSession();
    header("location: ../../index.php");
}

checkSession();

if (timeSessionFinish()) {
    header("location: ../../index.php");
}

?>
