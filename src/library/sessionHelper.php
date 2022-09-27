<?php
// lo podemos usar para validar que el usuario sigue logeado y dejarle acceder al dashboard.

session_start();
session_destroy();
header("Location: ../../ini.php");

