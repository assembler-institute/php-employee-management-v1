<?php
//User data
$email = $_POST["email"];
$password = $_POST["password"];

//Db data
$users = json_decode(file_get_contents("../../resources/users.json"), true);
