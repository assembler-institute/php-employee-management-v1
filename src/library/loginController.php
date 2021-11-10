<!-- Recibimos la petición $_POST y autenticamos los datos con las funciones del Manager -->

<?php

$user = $_POST["email"];
$password = $_POST["password"];


echo $user . $password;
