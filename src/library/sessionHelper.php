<?php
session_start();

unset($_SESSION["loged"]);
setcookie(session_name(),"",time() - 3600);
session_destroy();


$_SESSION["logout"]="You already logout";
header("Location:../../index.php");