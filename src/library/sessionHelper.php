<?php
function a($m, $s){
// Controla cuando se ha creado y cuando tiempo ha recorrido 
$min = intval(date('i'));
$seconds = intval(date('s'));
if (($min-$m == 10) && ($seconds-$s == 0)) {
    // Si ha pasado el tiempo sobre el limite destruye la session
    destruir_session();
}

return date('s');
}
// Función para destruir y resetear los parámetros de sesión
function destruir_session() {
    session_start();
    $_SESSION = array();
    if ( ini_get( 'session.use_cookies' ) ) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params[ 'path' ],
            $params[ 'domain' ],
            $params[ 'secure' ],
            $params[ 'httponly' ] );
    }
    @session_destroy();
    header("Location: ../index.php?logout=true");
}