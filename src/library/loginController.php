<?php
require_once "./loginManager.php";

// $file = "../../resources/users.json";
// $Allusers = file_get_contents($file);
// $usersAll = json_decode($Allusers);
// $userName = $usersAll->users;

if (isset($_POST["submit"])) {
    echo "entro?";
    $postEmail = $_POST["email"];
    $postPassword = $_POST["password"];
    sesssioncheck($postEmail, $postPassword, "../../resources/users.json");
}

if (isset($_POST["logout"])) {
    sessionlogout("Location:../../index.php");
}
?>