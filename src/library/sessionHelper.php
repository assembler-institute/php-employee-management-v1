<?php
if (!isset($_SESSION)) {
  session_start();
}
function checkExpiredSession()
{
  if (isset($_SESSION["timeout"])) {
    if (time() > $_SESSION["timeout"]) {
      require_once('loginController.php');
      cerrar_sesion();
    }
  }
}

function initSessionTimeout()
{
  $sessionTTL = 600;
  $_SESSION["timeout"] = time() + $sessionTTL;
}
