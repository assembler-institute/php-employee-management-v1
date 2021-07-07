<?php
require_once "loginManager.php";
session_start();
//antes de hacer los cálculos, compruebo que el usuario está logueado 
if (isset($_SESSION['authUserId'])) {
    //calculamos el tiempo transcurrido 
    $fechaGuardada = $_SESSION["lastLogin_timeStamp"];
    $ahora = time();
    $tiempo_transcurrido = $ahora - $fechaGuardada;

    //comparamos el tiempo transcurrido 
    if ($tiempo_transcurrido >= 10) {
        //si pasaron 10 minutos o más 
        destroySession(); // destruyo la sesión 
        $indexPath = dirname(__DIR__, 2) . '/index.php';

        // header("Location: $indexPath "); //envío al usuario a la pag. de autenticación 
        //sino, actualizo la fecha de la sesión 
    } else {
        $_SESSION["lastLogin_timeStamp"] = $ahora;
    }
} else {
    //si no está logueado lo envío a la página de autentificación 
    //     header("Location: $indexPath ");
}
