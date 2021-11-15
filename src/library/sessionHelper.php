<?php

# Create login Session -> index.php
function startSession($email)
{
  session_start();

  $_SESSION['user_email'] = $email;

  return;
}

# Verify 
function verifyLogin()
{
  session_start();

  $logged = isset($_SESSION) && isset($_SESSION['user_email']) ? true : false;

  return $logged;
}

# Destroy user Session
function destroySession()
{
  // Inicializar la sesión.
  // Si está usando session_name("algo"), ¡no lo olvide ahora!
  session_start();

  // Destruir todas las variables de sesión.
  unset($_SESSION);

  // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
  // Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
      session_name(),
      '',
      time() - 42000,
      $params["path"],
      $params["domain"],
      $params["secure"],
      $params["httponly"]
    );
  }

  // Finalmente, destruir la sesión.
  if (isset($_SESSION)) {
    session_destroy();
  }
}
