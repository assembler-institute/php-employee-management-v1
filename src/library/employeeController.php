<?php
session_start();
isset($_SESSION["email"]) ? header("Location:./src/dashboard.php") : ""

?>